<?php 
    ob_start(); 
    // $castingGenre = $detailGenre->fetch();
    // $acteur = $requeteActeur->fetchAll();
    // var_dump('test'); die;
?>

<table class="uk-table uk-table-striped">
    <thead>
       
    </thead>
    <tbody>
        <?php
        ?>    
            <div class="Casting-detail">
                    <?php
                        foreach($detailGenre->fetchAll() as $Id => $genreDet) { ?>
                            <h2><?= $genreDet['libelle'] . ' : ' . $genreDet['film'] ?><img src="<?= $genreDet['URLimg'] ?>" alt="film"></h2> 
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