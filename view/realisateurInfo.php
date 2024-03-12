<?php 
    ob_start(); 
    $RealisateursInfo = $requeteInfoRealisateur->fetchAll();
?>

<h1>Filmographie d'un realisateur : </h1>

<table class="uk-table uk-table-striped">
    
    <tbody>
        <?php
            foreach($RealisateursInfo as $RealisateurInfo) { ?>
                <div>
                    <p>Nom et prénom : <?= $RealisateurInfo["NomReal"] ?></p>
                    <p>Sexe : <?= $RealisateurInfo["sexe"] ?></p>
                    <p>Date de naissance : <?= $RealisateurInfo["dateNaissance"] ?></p>
                    <p>Tous les films d'un realisateur : <?= $RealisateurInfo["filmographie"] ?></p>
                </div>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Acteurs";
$titre_secondaire = "Liste des Acteurs";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>