<?php 
    ob_start(); 
    $film = $requete->fetch();
    $acteurs = $requeteActeur->fetchAll(); // Stocker les résultats dans une variable
?>

<table class="uk-table uk-table-striped">
    <thead>
       
    </thead>
    <tbody>
        <?php
        ?>    
            <div class="Film-detail">
                    <h1><?= $film["Titre"] ?></h1>
                    <img src="<?= $film["URLimg"] ?>" alt="Photo de film">
                    <div class="detailColonne">
                        <p>Anné de sortie : <?= $film["AnneSortFr"] ?></p>
                        <p>Les genres du film :</p>
                        <?php
                            foreach($requeteGenre->fetchAll() as $Id => $genre) { ?>
                                <p><?= $genre["genreFilm"] ?></p>
                        <?php } ?>
                        <p>Avis <?= $film["Note"] ?>/5</p>
                        <p>Réalisateur : <a href="index.php?action=realisateurCasting&id=<?= $film['Id_Realisateur'] ?>"> <?= $film["RealisateurNom"] ?> </a> </p>
                        <p>Acteurs :</p>
                        <a href="index.php?action=ajoutCastingFilmForm&id=<?= $film['Id_Film'] ?>">Ajouter casting</a>

                        <?php
                            foreach($acteurs as $acteur) { ?>
                                <p><?= $acteur["act"] ?> dans le rôle de <?= $acteur["nomPersonnage"] ?></p>
                                <a href='index.php?action=acteurCasting&id=<?=  $acteur['Id_Acteur'] ?>'>Détails de l'acteur</a>
                                <a href="index.php?action=supprimerActeur&id=<?= $acteur['Id_Acteur'] ?>">Supprimer l'acteur</a>
                            <?php }
                        ?>
                        
                    </div>
            </div>
                    
       
    </tbody>
</table>

<?php

$titre = "Détails des films";
$titre_secondaire = "Détails des films";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; 
?>