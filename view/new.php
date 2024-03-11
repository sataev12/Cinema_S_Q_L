<?php 
    ob_start(); 
    $film = $requete->fetchAll();
?>

<p class="uk-label uk-label-warning">Il y a <?= count($film) ?> acteurs</p>
<a href="page.php?action=details">Voir les détails</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>TITRE</tr>
        <tr>ANNEE SORTIE</tr>
        <tr>Image</tr>
    </thead>
    <tbody>
        <?php
            foreach($film as $filmR) { ?>
                <tr>
                    <td><?= $filmR["Titre"] ?></td>
                    <td><?= $filmR["AnneSortFr"] ?></td>
                    <td><img src="<?= $filmR["URLimg"] ?>" alt="Photo de film"></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Film le plus recent";
$titre_secondaire = "Liste des Film le plus recent";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>