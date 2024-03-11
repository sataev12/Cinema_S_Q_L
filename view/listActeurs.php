<?php 
    ob_start(); 
    $acteurs = $requete->fetchAll();
?>

<p class="uk-label uk-label-warning">Il y a <?= count($acteurs) ?> acteurs</p>
<a href="page.php?action=details">Voir les détails</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>TITRE</tr>
        <tr>ANNEE SORTIE</tr>
    </thead>
    <tbody>
        <?php
            foreach($acteurs as $acteur) { ?>
                <tr>
                    <td><?= $acteur["Prenom"] ?></td>
                    <td><?= $acteur["Nom"] ?></td>
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