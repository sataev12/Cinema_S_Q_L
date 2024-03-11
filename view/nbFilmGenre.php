<?php 
    ob_start(); 
    $nbFilmGenr = $requete->fetchAll();
?>

<a href="page.php?action=new">Voir les détails</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>Libelle</tr>
        <tr>Nombre des films </tr>
    </thead>
    <tbody>
        <?php
            foreach($nbFilmGenr as $filmNb) { ?>
                <tr>
                    <td><?= $filmNb["Libelle"] ?></td>
                    <td><?= $filmNb["NbFilms"] ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Nombre des films par genrs";
$titre_secondaire = "Nombre des films par genrs";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>