<?php 
    ob_start(); 
    $role = $requete->fetchAll();
?>


<table class="uk-table uk-table-striped">
    <thead>
        <tr>Nome de personnage</tr>
    </thead>
    <tbody>
        <?php
            foreach($role as $nmPersonnage) { ?>
                <tr>
                    <td><a href="index.php?action=detailRole&id=<?= $nmPersonnage['id_role'] ?>"> <?= $nmPersonnage["NomPersonnage"] ?> </a></td>
                    <td><a href="index.php?action=supprimerRole&id=<?= $nmPersonnage['id_role'] ?>">Supprimer</a></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?action=ajoutRoleForm">Ajouter un rôle</a>

<?php

$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>