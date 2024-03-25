<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    // Lister les films

    public function listFilms(){

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM Film
        ");
        $requete->execute();
        $requeteFilm = $pdo->prepare("
        SELECT URLimg
        FROM Film
        WHERE id_film = 1
        ");
        $requeteFilm->execute();
        require "view/listFilms.php";

    }
    public function listActeurs(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM Acteurs 
        INNER JOIN personne ON Acteurs.id_personne = personne.id_personne
        ");
        $requete->execute();
        require "view/listActeurs.php";
    }

    public function acteurFilmographie($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT CONCAT(Personne.Nom, ' ', Personne.Prenom) AS NomActeur, Personne.Sexe AS sexe, Personne.DateNaissance AS DateNaissance, Acteurs.Id_Acteur 
        FROM `Acteurs` 
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        WHERE Acteurs.Id_Acteur = :id;
        ");
        $requete->execute([
            ':id' => $id
        ]);
        $requeteFilmographie = $pdo->prepare("
            SELECT Film.Titre AS titre, Film.Id_Film
            FROM jouer
            INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
            INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
            INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
            WHERE Acteurs.Id_Acteur = :id;
        ");
        $requeteFilmographie->execute([
            ':id' => $id
        ]);
        $requeteRole = $pdo->prepare("
            SELECT Role.NomPersonnage, CONCAT(Personne.Nom, ' ', Personne.Prenom) AS Nom, Film.Titre, Role.id_role    
            FROM jouer
            INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
            INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
            INNER JOIN Role ON jouer.id_role = Role.id_role
            INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
            WHERE Acteurs.Id_Acteur = :id
        ");
        $requeteRole->execute([
            ':id' => $id
        ]);
        

        require "view/acteurFilmographie.php";
    }

    public function supprimerRoleActeur($id_role) {
        $pdo = Connect::seConnecter();
        $supprimerRoleActeur = $pdo->prepare("
        DELETE FROM jouer
        WHERE id_role = :id_role
        ");
        $supprimerRoleActeur->execute([
            ':id_role' => $id_role
        ]);


        $_SESSION['message'] = "Un casting d'un acteur a été supprimer avec succès !";
        header('Location: index.php?action=listActeurs');
    }

    public function supprimerFilmAct($Id_Film){
        $pdo = Connect::seConnecter();
        $supprimerFilmAct = $pdo->prepare("
            DELETE FROM jouer
            WHERE Id_Film = :Id_Film
        ");
        $supprimerFilmAct->execute([
            ':Id_Film' => $Id_Film
        ]);

        header("Location: index.php?action=listActeurs");
    }

    public function listRealisateur() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *
            FROM Realisateur
            INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
        ");
        $requete->execute();
        require "view/listRealisateur.php";
    }

    public function realisateurInfo($id) {
        $pdo = Connect::seConnecter();
        $requeteInfoRealisateur = $pdo->prepare("
        SELECT CONCAT(Personne.Nom, ' ', Personne.Prenom) AS NomReal, Personne.Sexe AS sexe, Personne.DateNaissance AS dateNaissance, Film.Titre AS filmographie
        FROM Realisateur
        INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
        INNER JOIN Film ON Realisateur.Id_Realisateur = Film.Id_Realisateur
        WHERE Realisateur.Id_Realisateur = :id;
        ");
        $requeteInfoRealisateur->execute([
            ':id' => $id
        ]);

        require "view/realisateurInfo.php";
    }

    public function castingFilm() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT DISTINCT Personne.Nom, Personne.Prenom, Personne.Sexe, Film.Titre, Film.URLimg
        FROM jouer
        INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
        ");
        $requete->execute();
        require "view/castingFilm.php";
    }

    public function new() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Titre, AnneSortFr, URLimg 
        FROM Film 
        WHERE AnneSortFr > YEAR(CURRENT_DATE) - 5 
        ORDER BY AnneSortFr DESC;
        ");
        $requete->execute();
        require "view/new.php";
    }

    public function acteurPlusAgee() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Personne.Nom, Personne.Prenom, ROUND((DATEDIFF('2024-02-29', Personne.DateNaissance) / 365), 0) AS DiffAge
        FROM Acteurs
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        HAVING DiffAge > 50;
        ");
        $requete->execute();
        require "view/acteurPlusAgee.php";
    }

    public function nbFilmGenre() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Genre.Libelle, COUNT(Film.Id_Film) AS NbFilms
        FROM genre_film
        INNER JOIN Genre ON genre_film.Id_Genre = Genre.Id_Genre
        INNER JOIN Film ON genre_film.Id_Film = Film.Id_Film
        GROUP BY Genre.Libelle
        ");
        $requete->execute();
        require "view/nbFilmGenre.php";
    }

    public function lesPlusLong() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Film.Titre, SEC_TO_TIME(Film.Duree * 60) AS Duree_formatée
        FROM Film 
        WHERE Film.Duree > 135
        ORDER BY Duree_formatée DESC;
        ");
        $requete->execute();
        require "view/lesPlusLong.php";
    }

    public function ajoutGenreForm() {
        
        require "view/ajoutGenreForm.php";
        

    }

    public function ajoutGenre() {
        if (isset($_POST['submit'])) {
                    // Verifications des champs de form
                    $Libelle = filter_input(INPUT_POST, "Libelle", FILTER_SANITIZE_SPECIAL_CHARS);
                    $films = filter_input(INPUT_POST, "Id_Film", FILTER_SANITIZE_SPECIAL_CHARS);
                }
                if ($Libelle) {
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->prepare("
                    INSERT INTO Genre(Libelle)
                    VALUES (:Libelle)
                    ");
                    $requete->execute([
                        ':Libelle' => $Libelle
                    ]);
                } 
    }

    public function ajoutRoleForm() {

        require "view/ajoutRoleForm.php";
    }

    public function ajoutRole() {
        $nom = '';
        if(isset($_POST['submit'])) {
            //verif
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
        }if($nom){
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            INSERT INTO Role(NomPersonnage)
            VALUES (:nom)
            ");
            $requete->execute([
                ':nom' => $nom
            ]);
        }

        header("Location: index.php?action=listeRole");
        
    }

    public function ajoutPersonneForm() {

        require "view/ajoutPersonneForm.php";
    }
    public function ajoutPersonne() {
        if(isset($_POST['submit'])) {

            //Verif
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
            $dateNaissance = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_SPECIAL_CHARS);
            $est_acteur = isset($_POST['acteur']) ? 1 : 0;
            $est_realisateur = isset($_POST['realisateur']) ? 1 : 0;
            $photoVariable = isset($_FILES['file']);
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];
            $type = $_FILES['file']['type'];

            $tabExtention = explode('.', $name);
            $extention = strtolower(end($tabExtention));


            //Tableau des extensions qu'on autorise
            $extentionsAutorisees = ['jpg', 'jpeg', 'gif', 'png'];
            $tailleMax = 40000000;


        }if($nom && $prenom && $sexe && $dateNaissance && $photoVariable && in_array($extention, $extentionsAutorisees) && $size <= $tailleMax && $error == 0) {
            
            $uniqueName = uniqid('', true);
            $fileName = $uniqueName.'.'.$extention;

            move_uploaded_file($tmpName, './public/css/img/'.$fileName);

            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            INSERT INTO Personne(Nom, Prenom, Sexe, DateNaissance, Photo)
            VALUES(:nom, :prenom, :sexe, :dateNaissance, :photo);
            ");
            $requete->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':sexe' => $sexe,
            ':dateNaissance' => $dateNaissance,
            ':photo' => $fileName
            ]);

            // Si la personne est un acteur, l'ajouter à la table Acteur
            if($est_acteur) {
                $dernier_personne_id = $pdo->lastInsertId();
                $requete_acteur = $pdo->prepare("
                INSERT INTO Acteurs(id_personne)
                VALUES(:id_personne);
                ");
                $requete_acteur->execute([
                    ':id_personne' => $dernier_personne_id
                ]);
                // Une message de succèsse si on arrive bien ajouter un acteur
                $_SESSION['message'] = "Un acteur a été ajoutée avec succès !";
                header("Location: index.php?action=ajoutPersonneForm");
                exit();
            }

            // Si la personne est un réalisateur, l'ajouter à la table Realisateur
            if($est_realisateur) {
                $dernier_personne_id = $pdo->lastInsertId();
                $requete_realisateur = $pdo->prepare("
                INSERT INTO Realisateur(id_personne)
                VALUES(:id_personne);
                ");
                $requete_realisateur->execute([
                    ':id_personne' => $dernier_personne_id
                ]);
                // Une message de succèsse si on arrive bien ajouter un réalisateur
                $_SESSION['message'] = "Un réalisateur a été ajoutée avec succès !";
                header("Location: index.php?action=ajoutPersonneForm");
                exit();
            }
            // Ajouter une photo
        }
    }

    public function detailsFilm($id) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
                SELECT Film.Titre, Film.AnneSortFr, Film.Duree, Film.Synopsis, Film.Note, Film.Affiche,
                    CONCAT(Personne.Nom,  ' ', Personne.Prenom) AS RealisateurNom, Film.URLimg, Realisateur.Id_Realisateur
                FROM `Film`
                INNER JOIN Realisateur ON Film.Id_Realisateur = Realisateur.Id_Realisateur
                INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
                WHERE Film.Id_Film = :id;
            ");
            $requete->execute([
                ':id' => $id
            ]);
            $requeteActeur = $pdo->prepare("
                SELECT CONCAT(Personne.Nom, ' ', Personne.Prenom) AS act, nomPersonnage, Acteurs.Id_Acteur
                FROM jouer
                INNER JOIN Role ON jouer.id_role = Role.id_role
                INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
                INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
                INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
                WHERE Film.Id_Film = :id;
            ");
            $requeteActeur->execute([
                ':id' => $id
            ]);
            $requeteGenre = $pdo->prepare("
            SELECT Genre.Libelle AS genreFilm, Film.Titre 
            FROM `genre_film`
            INNER JOIN Genre ON genre_film.Id_Genre = Genre.Id_Genre
            INNER JOIN Film ON genre_film.Id_Film = Film.Id_Film
            WHERE genre_film.Id_Film = :id;
            ");
            $requeteGenre->execute([
                ':id' => $id
            ]);
            require "view/detailsFilm.php";
    }

    public function acteurCasting($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT CONCAT (Personne.Nom, ' ', Personne.Prenom) AS intiAct, Personne.Sexe AS sexe, Personne.DateNaissance AS dtNaissance
        FROM `Acteurs` 
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        WHERE Acteurs.Id_Acteur = :id;
        ");
        $requete->execute([
            'id' => $id
        ]);
        $filmRoleActeur = $pdo->prepare("
            SELECT Film.Titre AS filmAct, Role.NomPersonnage AS roleAct, Acteurs.Id_Acteur 
            FROM `jouer` 
            INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
            INNER JOIN Role ON jouer.id_role = Role.id_role
            INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
            WHERE Acteurs.Id_Acteur = :id
        ");
        $filmRoleActeur->execute([
            ':id' => $id
        ]);
        require "view/acteurCasting.php";
    }

    public function realisateurCasting($id) {
        $pdo = Connect::seConnecter();
        $requeteInfoRealisateur = $pdo->prepare("
            SELECT CONCAT(Personne.Nom, ' ', Personne.Prenom) AS Nom, Personne.Sexe AS sexe, Personne.DateNaissance AS DateNaissance
            FROM Realisateur
            INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
            WHERE Realisateur.Id_Realisateur = :id
        ");
        $requeteInfoRealisateur->execute([
            ':id' => $id
        ]);
        $requeteInfoRealisateurs = $requeteInfoRealisateur->fetch();
        

        // -------------------------------------------Filmographie-------------------------------------

        $tousFilmRealstr = $pdo->prepare("
        SELECT Film.Titre AS filmRealistr
        FROM `Realisateur` 
        INNER JOIN Film ON Realisateur.Id_Realisateur = Film.Id_Realisateur
        WHERE Realisateur.Id_Realisateur = :id
        ");
        $tousFilmRealstr->execute([
            ':id' => $id
        ]);
        require "view/realisateurCasting.php";
    }

    public function listGenre() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Libelle, Id_Genre
        FROM Genre
        ");
        $requete->execute();

        require "view/listGenre.php";
    }




    public function detailGenre($id) {
        $pdo = Connect::seConnecter();
        $detailGenre = $pdo->prepare("
        SELECT Genre.Libelle AS libelle, Film.Titre AS film, genre_film.Id_Genre AS idGenre, Film.URLimg AS URLimg
        FROM `genre_film` 
        INNER JOIN Genre ON genre_film.Id_Genre = Genre.Id_Genre
        INNER JOIN Film ON genre_film.Id_Film = Film.Id_Film
        WHERE genre_film.Id_Genre = :id
        ");
        $detailGenre->execute([
            ':id' => $id
        ]);

        require "view/detailGenre.php";
    }

    public function listeRole(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT NomPersonnage, id_role
        FROM `Role`
        ");
        $requete->execute();

        require "view/listeRole.php";
    }

    public function detailRole($id) {
        $pdo = Connect::seConnecter();

        $requeteRole = $pdo->prepare("
        SELECT *
        FROM Role
        WHERE id_role = :id
        ");
        $requeteRole->execute([
            ':id' => $id
        ]);



        $requeteActeur = $pdo->prepare("
        SELECT CONCAT(Personne.Nom, ' ', Personne.Prenom) AS NomActeur, Film.Titre AS dansFilm   
        FROM `jouer`
        INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
        INNER JOIN Role ON jouer.id_role = Role.id_role
        INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        WHERE Role.id_role = :id;
        ");
        $requeteActeur->execute([
            ':id' => $id
        ]);

        require "view/detailRole.php";
    }

    // Modifier d'une personne

    public function modifierPersonneForm($Id_Acteur) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Personne.Nom AS Nom, Personne.Prenom AS Prenom, Personne.Sexe AS Sexe, Personne.DateNaissance AS DateNaissance, Id_Acteur, Personne.id_personne
        FROM `Acteurs`
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        WHERE Id_Acteur = :Id_Acteur
        ");
        $requete->execute([
            ':Id_Acteur' => $Id_Acteur
        ]);

        //Pour recuperer les données
        $resultat = $requete->fetch();

        // Verification si des données ont été trouvées
        if($resultat) {
            // Assignation des données récupérées aux variables
            $nom = $resultat['Nom'];
            $prenom = $resultat['Prenom'];
            $sexe = $resultat['Sexe'];
            $dateNaissance = $resultat['DateNaissance'];
            $idPersonne = $resultat['id_personne'];
        }

        //Affichage du formulaire de modification avec les données pre-remplies
        require "view/modifierPersonneForm.php";
    }

    public function modifierPersonne($idPersonne) {
        // Recuperer les données du formulaire
        $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
        $dateNaissance = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_SPECIAL_CHARS);
        // Mettre à jour les données dans la base des données
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        UPDATE Personne
        SET Nom = :nom, Prenom = :prenom, Sexe = :sexe, DateNaissance = :dateNaissance
        WHERE id_personne = :id_personne
        ");
        $requete->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':sexe' => $sexe,
            ':dateNaissance' => $dateNaissance,
            ':id_personne' => $idPersonne
        ]);


        
        $_SESSION['message'] = "La personne a été bien modifiée";
        header("Location: index.php?action=listActeurs");
        
    }

    public function ajoutFilmForm() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Personne.Nom AS Nom, Personne.Prenom AS Prenom, Id_Realisateur
        FROM Realisateur
        INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
        ");
        $requete->execute();

        $realisateur = $requete->fetchAll();
        
        $requeteGenreFilm = $pdo->prepare("
        SELECT Id_Genre, Libelle
        FROM Genre
        ");
        $requeteGenreFilm->execute();

        $genres = $requeteGenreFilm->fetchAll();
        

       

        require "view/ajoutFilmForm.php";
    }

    public function ajoutFilm() {
        if(isset($_POST['submit'])) {
            // Verification
            $Titre = filter_input(INPUT_POST, "Titre", FILTER_SANITIZE_SPECIAL_CHARS);
            $realisateur = filter_input(INPUT_POST, "Id_Realisateur", FILTER_SANITIZE_SPECIAL_CHARS);
            $AnneSortFr = filter_input(INPUT_POST, "AnneSortFr", FILTER_VALIDATE_INT);
            $Duree = filter_input(INPUT_POST, "Duree", FILTER_VALIDATE_INT);
            $Synopsis = filter_input(INPUT_POST, "Synopsis", FILTER_SANITIZE_SPECIAL_CHARS);
            $Note = filter_input(INPUT_POST, "Note", FILTER_VALIDATE_INT);
            $Affiche = filter_input(INPUT_POST, "Affiche", FILTER_SANITIZE_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_SPECIAL_CHARS);
            $photoVariable = isset($_FILES['file']);
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];
            $type = $_FILES['file']['type'];

            $tabExtention = explode('.', $name);
            $extention = strtolower(end($tabExtention));

            // Tableau des extention qu'on autorise
            $extentionsAutorisees = ['jpg', 'jpeg', 'gif', 'png'];
            $tailleMax = 40000000;

            // Vérification des genres sélectionnées
            $genresSelectionnes = isset($_POST['genres']) ? $_POST['genres'] : [];
            

        }if($Titre && $AnneSortFr && $Duree && $Synopsis && $Note && $Affiche && $photoVariable && in_array($extention, $extentionsAutorisees) && $size <= $tailleMax && $error == 0) {

            $uniqueName = uniqid('', true);
            $fileName = $uniqueName.'.'.$extention;

            move_uploaded_file($tmpName, './public/css/img/'.$fileName);

            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            INSERT INTO Film(Titre, AnneSortFr, Duree, Synopsis, Note, Affiche, Id_Realisateur, URLimg)
            VALUES (:Titre, :AnneSortFr, :Duree, :Synopsis, :Note, :Affiche, :Id_Realisateur, :photo)
            ");
            $requete->execute([
                ':Titre' => $Titre,
                ':AnneSortFr' => $AnneSortFr,
                ':Duree' => $Duree,
                ':Synopsis' => $Synopsis,
                ':Note' => $Note,
                ':Affiche' => $Affiche,
                ':Id_Realisateur' => $realisateur,
                ':photo' => $fileName
            ]);
            // Récupération de l'ID du film inséré
            $idFilm = $pdo->lastInsertId();
            // Insertion des genres associés au film dans la table genre_film
            foreach($genresSelectionnes as $idGenre) {
                $requete_genre_film = $pdo->prepare("
                    INSERT INTO genre_film(Id_Genre, Id_Film)
                    VALUES (:Id_Genre, :Id_Film)
                ");
                $requete_genre_film->execute([
                    ':Id_Genre' => $idGenre,
                    ':Id_Film' => $idFilm
                ]);
            }

        }
    }

    public function ajoutCastingForm() {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare("
            SELECT Id_Film, Titre 
            FROM Film
        ");
        $requeteFilm->execute();
        $titreFilm = $requeteFilm->fetchAll();

        $requeteActeur = $pdo->prepare("
        SELECT CONCAT(Personne.Nom, ' ', Personne.Prenom) AS Nom, Acteurs.Id_Acteur AS Id_Acteur
        FROM Acteurs
        INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
        "); 
        $requeteActeur->execute();
        $nomActeurs = $requeteActeur->fetchAll();

        $requeteRole = $pdo->prepare("
            SELECT id_role, NomPersonnage 
            FROM Role
        ");
        $requeteRole->execute();
        $requeteRoles = $requeteRole->fetchAll();

        require "view/ajoutCastingForm.php";
    }

    public function ajoutCasting() {
        if(isset($_POST['submit'])) {
            // Verification
            $acteurId = filter_input(INPUT_POST, "Id_Acteur", FILTER_SANITIZE_SPECIAL_CHARS);
            $filmId = filter_input(INPUT_POST, "Id_Film", FILTER_SANITIZE_SPECIAL_CHARS);
            $roleId = filter_input(INPUT_POST, "id_role", FILTER_SANITIZE_SPECIAL_CHARS);
        }if ($acteurId && $filmId && $roleId) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            INSERT INTO jouer(Id_Film, Id_Acteur, id_role)
            VALUES(:Id_Film, :Id_Acteur, :id_role)
            ");
            $requete->execute([
                ':Id_Film' => $filmId,
                ':Id_Acteur' => $acteurId,
                ':id_role' => $roleId
            ]);
        }    
        
        header("Location: index.php?action=ajoutCastingForm");
    }


    public function acceuil() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM Film
        ");
        $requete->execute();
        $requeteFilm = $pdo->prepare("
        SELECT URLimg
        FROM Film
        WHERE id_film = 1
        ");
        $requeteFilm->execute();
        require "view/acceuil.php";
    }

    public function modifierRealisateurForm($Id_Realisateur) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT Personne.Nom AS Nom, Personne.Prenom AS Prenom, Personne.Sexe AS Sexe, Personne.DateNaissance AS DateNaissance, Id_Realisateur, Personne.id_personne
        FROM `Realisateur`
        INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
        WHERE Id_Realisateur = :Id_Realisateur
        ");
        $requete->execute([
            ':Id_Realisateur' => $Id_Realisateur
        ]);

        //Pour recuperer les données
        $resultat = $requete->fetch();

        // Verification si des données ont été trouvées
        if($resultat) {
            // Assignation des données récupérées aux variables
            $nom = $resultat['Nom'];
            $prenom = $resultat['Prenom'];
            $sexe = $resultat['Sexe'];
            $dateNaissance = $resultat['DateNaissance'];
            $idPersonne = $resultat['id_personne'];
        }

        //Affichage du formulaire de modification avec les données pre-remplies
        require "view/modifierRealisateurForm.php";
    }

    public function modifierRealisateur($idPersonne) {
        // Recuperer les données du formulaire
        $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_SPECIAL_CHARS);
        $dateNaissance = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_SPECIAL_CHARS);
        // Mettre à jour les données dans la base des données
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        UPDATE Personne
        SET Nom = :nom, Prenom = :prenom, Sexe = :sexe, DateNaissance = :dateNaissance
        WHERE id_personne = :id_personne
        ");
        $requete->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':sexe' => $sexe,
            ':dateNaissance' => $dateNaissance,
            ':id_personne' => $idPersonne
        ]);


        
        $_SESSION['message'] = "La personne a été bien modifiée";
        header("Location: index.php?action=listRealisateur");
        
    }


    public function modifierFilmForm($Id_Film) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT Titre, AnneSortFr, Duree, Synopsis, Note, Affiche, Id_Realisateur
            FROM Film
            WHERE Id_Film = :Id_Film
        ");
        $requete->execute([
            ':Id_Film' => $Id_Film
        ]);
    
        // Récupération des détails du film
        $film = $requete->fetch();
    
        // Récupération des genres associés à ce film
        $requeteGenresFilm = $pdo->prepare("
            SELECT Id_Genre
            FROM genre_film
            WHERE Id_Film = :Id_Film
        ");
        $requeteGenresFilm->execute([
            ':Id_Film' => $Id_Film
        ]);
    
        // Récupération des IDs de genres associés
        $genresFilm = $requeteGenresFilm->fetchAll();
    
        // Récupération de tous les genres disponibles
        $requeteGenres = $pdo->prepare("
            SELECT Id_Genre, Libelle
            FROM Genre
        ");
        $requeteGenres->execute();
    
        // Récupération des genres disponibles
        $genresDisponibles = $requeteGenres->fetchAll();

        // Récupérer la liste des réalisateurs
        $requeteRealisateurs = $pdo->prepare("
            SELECT personne.id_personne, Realisateur.Id_Realisateur, Personne.Nom, Personne.Prenom
            FROM Realisateur
            INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
        ");
        $requeteRealisateurs->execute();
        $realisateurs = $requeteRealisateurs->fetchAll();
    
        // Affichage du formulaire de modification avec les données pré-remplies
        require "view/modifierFilmForm.php";
    }
    
    public function modifierFilm($Id_Film) {
        
        // Récupération des données du formulaire
        $Titre = filter_input(INPUT_POST, "Titre", FILTER_SANITIZE_SPECIAL_CHARS);
        $realisateur = filter_input(INPUT_POST, "Id_Realisateur", FILTER_SANITIZE_SPECIAL_CHARS);
        $AnneSortFr = filter_input(INPUT_POST, "AnneSortFr", FILTER_VALIDATE_INT);
        $Duree = filter_input(INPUT_POST, "Duree", FILTER_VALIDATE_INT);
        $Synopsis = filter_input(INPUT_POST, "Synopsis", FILTER_SANITIZE_SPECIAL_CHARS);
        $Note = filter_input(INPUT_POST, "Note", FILTER_VALIDATE_INT);
        $Affiche = filter_input(INPUT_POST, "Affiche", FILTER_SANITIZE_SPECIAL_CHARS);
        $photoVariable = isset($_FILES['file']);
        
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $type = $_FILES['file']['type'];
        
        $tabExtention = explode('.', $name);
        $extention = strtolower(end($tabExtention));
        
        
        // Tableau des extensions autorisées
        $extentionsAutorisees = ['jpg', 'jpeg', 'gif', 'png'];
        $tailleMax = 40000000;
        
        // Vérification des genres sélectionnés
        $genresSelectionnes = isset($_POST['genres']) ? $_POST['genres'] : [];
        

        // Vérification des données du formulaire et des critères de sécurité
        if($Titre && $AnneSortFr && $Duree && $Synopsis && $Note && $Affiche && $photoVariable && in_array($extention, $extentionsAutorisees) && $size <= $tailleMax && $error == 0) {
            
            $uniqueName = uniqid('', true);
            $fileName = $uniqueName.'.'.$extention;
    
            move_uploaded_file($tmpName, './public/css/img/'.$fileName);
    
            // Mise à jour des informations du film dans la base de données
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
                UPDATE Film
                SET Titre = :Titre, AnneSortFr = :AnneSortFr, Duree = :Duree, Synopsis = :Synopsis, Note = :Note, Affiche = :Affiche, Id_Realisateur = :Id_Realisateur, URLimg = :photo
                WHERE Id_Film = :Id_Film
            ");
            $requete->execute([
                ':Titre' => $Titre,
                ':AnneSortFr' => $AnneSortFr,
                ':Duree' => $Duree,
                ':Synopsis' => $Synopsis,
                ':Note' => $Note,
                ':Affiche' => $Affiche,
                ':Id_Realisateur' => $realisateur,
                ':photo' => $fileName,
                ':Id_Film' => $Id_Film
            ]);
    
            // Suppression des anciens genres associés au film dans la table genre_film
            $requeteSuppressionGenres = $pdo->prepare("
                DELETE FROM genre_film
                WHERE Id_Film = :Id_Film
            ");
            $requeteSuppressionGenres->execute([
                ':Id_Film' => $Id_Film
            ]);
           
            // Réinsertion des nouveaux genres sélectionnés dans la table genre_film
            foreach($genresSelectionnes as $idGenre) {
                $requeteGenreFilm = $pdo->prepare("
                    INSERT INTO genre_film(Id_Genre, Id_Film)
                    VALUES (:Id_Genre, :Id_Film)
                ");
                $requeteGenreFilm->execute([
                    ':Id_Genre' => $idGenre,
                    ':Id_Film' => $Id_Film
                ]);
            }

        }

        header("location: index.php?action=listFilms");
    }

    public function supprimerFilm($Id_Film) {
        $pdo = Connect::seConnecter();
    
        // Supprimer les entrées associées dans la table jouer
        $requeteSupprimerJouer = $pdo->prepare("
            DELETE FROM jouer
            WHERE Id_Film = :Id_Film
        ");
        $requeteSupprimerJouer->execute([':Id_Film' => $Id_Film]);
    
        // Supprimer les entrées associées dans la table genre_film
        $requeteSupprimerGenreFilm = $pdo->prepare("
            DELETE FROM genre_film
            WHERE Id_Film = :Id_Film
        ");
        $requeteSupprimerGenreFilm->execute([':Id_Film' => $Id_Film]);
    
        // Supprimer le film de la table Film
        $requeteSupprimerFilm = $pdo->prepare("
            DELETE FROM Film
            WHERE Id_Film = :Id_Film
        ");
        $requeteSupprimerFilm->execute([':Id_Film' => $Id_Film]);
    
        // Redirection vers une page appropriée
        // Par exemple, retourner à la liste des films
        header("Location: index.php?action=listFilms");
    }

    public function supprimerGenre($Id_Genre) {
        $pdo = Connect::seConnecter();
        $requeteSupprimeGenr_film = $pdo->prepare("
            DELETE FROM Genre
            WHERE Id_Genre = :Id_Genre
        ");
        $requeteSupprimeGenr_film->execute([
            ':Id_Genre' => $Id_Genre
        ]);

        header("Location: index.php?action=listGenre");
    }

    public function supprimerRole($Id_Role){
        
        $pdo = Connect::seConnecter();
        $requetSupprimerRoleJoue = $pdo->prepare("
            DELETE FROM jouer
            WHERE id_role = :id_role
        ");
        $requetSupprimerRoleJoue->execute([
            ':id_role' => $Id_Role
        ]);

        $requetSupprimerGenre = $pdo->prepare("
            DELETE FROM Role
            WHERE id_role = :id_role
        ");
        $requetSupprimerGenre->execute([
            ':id_role' => $Id_Role
        ]);


        header("Location: index.php?action=listeRole");
    }

    public function supprimerActeur($Id_Acteur) {
        $pdo = Connect::seConnecter();
        $requetSupActeurJoue = $pdo->prepare("
            DELETE FROM jouer
            WHERE Id_Acteur = :Id_Acteur
        ");
        $requetSupActeurJoue->execute([
            ':Id_Acteur' => $Id_Acteur
        ]);
        
    }

}

