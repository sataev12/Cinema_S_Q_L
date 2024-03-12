<?php 
    ob_start(); 
    // $castingGenre = $requete->fetch();
    // $acteur = $requeteActeur->fetchAll();
    // var_dump($castingGenre); die;
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
                        foreach($requete->fetchAll() as $id => $genre) { ?>
                            <h2><a href="index.php?action=detailGenre&id=<?= $genre['idGenre'] ?>"> <?= $genre['libelle']?> </a></h2>
                            <a href='index.php?action=detailGenre&id=<?= $genre['idGenre'] ?>'>Details d'un acteur</a>           
                            <h3><?= $genre['idGenre'] ?></h3>
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