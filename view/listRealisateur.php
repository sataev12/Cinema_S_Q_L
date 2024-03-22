<?php 
    ob_start(); 
    $Realisateurs = $requete->fetchAll();
?>

<p class="uk-label uk-label-warning">Il y a <?= count($Realisateurs) ?> acteurs</p>
<a href="page.php?action=details">Voir les détails</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>TITRE</tr>
        <tr>ANNEE SORTIE</tr>
    </thead>
    <tbody>
        <?php
            foreach($Realisateurs as $realisateur) { ?>
                <tr>
                    <td><?= $realisateur["NomRealisateur"] ?><a href="index.php?action=realisateurCasting&id=<?= $realisateur["Id_Realisateur"] ?>">Detail d'un realisateur</a><br>
                    <a href="index.php?action=modifierRealisateurForm&id=<?= $realisateur['Id_Realisateur'] ?>">Modifier</a>
                </td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Realisateur";
$titre_secondaire = "Liste des Realisateur";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>