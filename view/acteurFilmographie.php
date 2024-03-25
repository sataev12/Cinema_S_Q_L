<?php 
    ob_start(); 
    $acteursInfo = $requete->fetchAll();
    // $role = $requeteRole->fetch();
    $filmAct = $requeteFilmographie->fetchAll();
    // $acteur = $requeteActeur->fetchAll();
    // var_dump($castingRole); die;
    $requeteRoles = $requeteRole->fetchAll();
?>


<table class="uk-table uk-table-striped">
    <thead>
       
    </thead>
    <tbody>
        <h1>Acteur : </h1>   
            <div class="Casting-detail">
                <?php
                        foreach($acteursInfo as $acteurInfo) { ?>
                            <h2><?= $acteurInfo['NomActeur'] ?> <br> Sexe: <?= $acteurInfo['sexe']?> <br> Date de naissance :  <?= $acteurInfo['DateNaissance']?></h2> 
                <?php   } ?>
                <?php
                        foreach($requeteRoles as $requeteRole) { ?>
                            <h2>joué le role <?= $requeteRole['NomPersonnage'] ?> dans un film <?= $requeteRole['Titre'] ?></h2>
                            <a href="index.php?action=supprimerRoleActeur&id=<?= $requeteRole['id_role'] ?>">Supprimer le role</a>
                <?php   } ?>  
                            

    
            </div>
               
       
    </tbody>
</table>

<?php

$titre = "Casting des genres";
$titre_secondaire = "Casting des genres :";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>