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
                <ul>
                    <?php
                        foreach($requete->fetchAll() as $id => $genre) { ?>
                            <li>
                                <a href='index.php?action=detailGenre&id=<?= $genre['Id_Genre'] ?>'> <?= $genre['Libelle']?> </a>
                            </li>
                            
                    <?php   } ?>
                </ul>
                    
                    
                            

    
            </div>
                    
       
    </tbody>
</table>

<?php

$titre = "Casting des genres";
$titre_secondaire = "Casting des genres :";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>