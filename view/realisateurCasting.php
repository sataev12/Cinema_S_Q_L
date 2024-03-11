<?php 
    ob_start(); 
    $realisateurFilm = $requete->fetch();
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
                <h1><?= $realisateurFilm["FilmRealstr"] ?></h1>
                <p>Nom et prenom de realisateur : <?= $realisateurFilm["initRealstr"] ?></p>
                <p>Sexe : <?= $realisateurFilm["sexe"] ?></p>
                <p>La date de naissance <?= $realisateurFilm["dtNaissance"] ?></p>
                <p>Realisateur des films suivants :</p>   
                <?php
                        foreach($tousFilmRealstr->fetchAll() as $Id => $castingRealisateur) { ?>
                            <p><?= $castingRealisateur['filmRealistr'] ?></p>
                <?php    } ?>           

    
            </div>
                    
       
    </tbody>
</table>

<?php

$titre = "Details des films";
$titre_secondaire = "Details des films";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>