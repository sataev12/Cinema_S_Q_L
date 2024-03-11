<?php 
    ob_start(); 
    $film = $requete->fetch();
    // $acteur = $requeteActeur->fetchAll();
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
                        <p>Avis <?= $film["Note"] ?>/5</p>
                        <p>Realisateur : <a href=""> <?= $film["Nom"] . " " . $film["Prenom"] ?> </a></p>
                        <p>Acteur :</p>
                        <?php
                            
                            foreach($requeteActeur->fetchAll() as $Id => $acteur) { ?>
                                
                                <p><?= $acteur["act"] ?> dans le rôle de <?= $acteur["nomPersonnage"] ?></p>
                                
                                
                                <a href='index.php?action=acteurCasting&id=<?= $acteur['Id_Acteur'] ?>'>Details d'un acteur</a>
                                
                            <?php }
                        ?>
                        
                    </div>
            </div>
                    
       
    </tbody>
</table>

<?php

$titre = "Details des films";
$titre_secondaire = "Details des films";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>