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
                    <td><?= $acteur["Nom"] ?> <a href="index.php?action=acteurFilmographie&id=<?= $acteur['Id_Acteur'] ?>">Detail d'un acteur</a> <br> 
                    <a href="index.php?action=modifierPersonneForm&id=<?= $acteur['Id_Acteur'] ?>">Modifier</a>
                    <a href="index.php?action=supprimerActeurPersonne&id=<?= $acteur['Id_Acteur'] ?>">Supprimer</a>
                    </td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
// Vérifier si un message de succès est défini
if(isset($_SESSION['message'])) {
    // Afficher le message de succès
    echo '<div class="success">' . $_SESSION['message'] . '</div>';
    // Vider la variable de session pour ne pas afficher le message à nouveau lors des prochains chargements de page
    unset($_SESSION['message']);
}
?>

<?php

$titre = "Liste des Acteurs";
$titre_secondaire = "Liste des Acteurs";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>