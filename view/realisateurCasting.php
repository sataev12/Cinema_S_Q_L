<?php 
    ob_start(); 
    
    // $acteur = $requeteActeur->fetchAll();
    // var_dump($realisateurFilm); die;
?>

<table class="uk-table uk-table-striped">
    <thead>
    </thead>
    <tbody>
        <?php
        ?>    
            <div class="Realisateur-detail">
                <h1><?= $requeteInfoRealisateurs['Nom'] ?></h1>
                <p>Nom et prenom de realisateur : <?= $requeteInfoRealisateurs["Nom"] ?></p>
                <p>Sexe : <?= $requeteInfoRealisateurs["sexe"] ?></p>
                <p>La date de naissance <?= $requeteInfoRealisateurs["DateNaissance"] ?></p>
                <p>Realisateur des films suivants :</p>   
                <?php
                        foreach($tousFilmRealstr->fetchAll() as $Id => $castingRealisateur) { ?>
                            <p><?= $castingRealisateur['filmRealistr'] ?></p>
                <?php    } ?>           

    
            </div>
                    
       
    </tbody>
</table>

<?php
    // Vérifier si un message de succès est défini
    if (isset($_SESSION['message'])) {
        // AFFICHER UN MESSAGE DE SUCCES
        echo '<div class="success">' . $_SESSION['message'] . '</div>';
        // Vider la variable pour ne pas l'afficher lors de la prochain chargement de page
        unset($_SESSION['message']);
    }
    ?>

<?php

$titre = "Details des films";
$titre_secondaire = "Details des films";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>