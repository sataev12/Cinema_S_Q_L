<?php 
    ob_start(); 
    $acteurFilm = $requete->fetch();
    // $acteur = $requeteActeur->fetchAll();
    // var_dump($acteurFilm); die;
?>

<table class="uk-table uk-table-striped">
    <thead>
       
    </thead>
    <tbody>
        <?php
        ?>    
            <div class="Acteur-detail">
                    <h1><?= $acteurFilm["intiAct"] ?></h1>
                    <p>Sexe : <?= $acteurFilm["sexe"] ?></p>
                    <p>La date de naissance : <?= $acteurFilm["dtNaissance"] ?></p>
                    <p>Acteur a joué dans les films suivants :</p>
                    <?php
                        foreach($filmRoleActeur->fetchAll() as $Id => $castingAct) { ?>
                            <p><?= $castingAct['filmAct'] ?> dans une rôle <?= $castingAct['roleAct'] ?></p>
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