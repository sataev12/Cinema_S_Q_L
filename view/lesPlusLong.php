<?php 
    ob_start(); 
    $lesPlusLong = $requete->fetchAll();
    
?>

<a href="page.php?action=details">Voir les détails</a>


<table class="uk-table uk-table-striped">
    <thead>
        <tr>TITRE</tr>
        <tr>La durée</tr>
    </thead>
    <tbody>
        <?php
        
            foreach($lesPlusLong as $longFilm) { ?>
                <tr>
                    <td><?= $longFilm["Titre"] ?></td>
                    <td><?= $longFilm["Duree_formatée"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Film les plus long";
$titre_secondaire = "Liste des Film le plus long";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>