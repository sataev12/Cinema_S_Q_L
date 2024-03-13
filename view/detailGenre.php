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
            
            <?php
                $films = $detailGenre->fetchAll();

                if (empty($films)) {
                    echo "<p>Aucun film dans ce genre.</p>";
                } else {
                    foreach($films as $Id => $genreDet) {
                        echo "<h2>{$genreDet['libelle']} : {$genreDet['film']} <img src='{$genreDet['URLimg']}' alt='film'></h2>";
                    }
                }
            ?>
                    
                            

                    
       
    </tbody>
</table>

<?php

$titre = "Casting des genres";
$titre_secondaire = "Casting des genres :";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>