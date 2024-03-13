<?php 
    ob_start(); 
    $castingRole = $requeteActeur->fetchAll();
    $role = $requeteRole->fetch();
    // $acteur = $requeteActeur->fetchAll();
    // var_dump($castingRole); die;
?>
<h1>Le role : <?= $role['NomPersonnage'] ?> a été joué par :</h1>
<table class="uk-table uk-table-striped">
    <thead>
       
    </thead>
    <tbody>
        <?php
        ?>    
            <div class="Casting-detail">
                    <?php
                        foreach($castingRole as $roleDet) { ?>
                            <h2><?= $roleDet['NomActeur'] ?> dans un film :  <?= $roleDet['dansFilm']?></h2> 
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