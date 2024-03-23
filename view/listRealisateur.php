<?php 
    ob_start(); 
    $Realisateurs = $requete->fetchAll();
    
?>



   
    <tbody>
        
    <?php
            // var_dump( $Realisateurs = $requete->fetch());die;
            foreach($Realisateurs as $Realisateur) { ?>
                <tr>
                    <td><?= $Realisateur["Prenom"] ?></td>
                    <td><?= $Realisateur["Nom"] ?> <a href="index.php?action=realisateurCasting&id=<?= $Realisateur['Id_Realisateur'] ?>">Detail d'un realisateur <?php var_dump($Realisateur['Id_Realisateur']) ?> </a> <br> 
                    <a href="index.php?action=modifierPersonneForm&id=<?= $Realisateur['Id_Realisateur'] ?>">Modifier</a>
                    
                    </td>
                </tr>
        <?php } ?>
    </tbody>

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