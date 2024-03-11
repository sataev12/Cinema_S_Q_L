<?php 
    ob_start(); 
    $acteursAgee = $requete->fetchAll();
?>

<a href="page.php?action=details">Voir les détails</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>TITRE</tr>
        <tr>ANNEE SORTIE</tr>
        <tr>Age</tr>
    </thead>
    <tbody>
        <?php
            foreach($acteursAgee as $acteurAge) { ?>
                <tr>
                    <td><?= $acteurAge["Prenom"] ?></td>
                    <td><?= $acteurAge["Nom"] ?></td>
                    <td><?= $acteurAge["DiffAge"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Acteurs";
$titre_secondaire = "Liste des Acteurs";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>