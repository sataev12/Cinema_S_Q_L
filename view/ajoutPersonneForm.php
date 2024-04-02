<?php 
    ob_start(); 
?>

<h1>Ajouter une personne</h1>
<form class="ajout-personne" action="index.php?action=ajoutPersonne" method="post" enctype="multipart/form-data">
    <label for="nom">  <!-- Le champ de titre -->
        Ajouter un nom : 
        <input type="text" name="nom" placeholder="Nom">
    </label>
    <label for="Prenom">  <!-- Le champ de titre -->
        Ajouter un prenom : 
        <input type="text" name="prenom" placeholder="Preom">
    </label>
    <label for="sexe">  <!-- Le champ de titre -->
        Ajouter un sexe : 
        <input type="text" name="sexe" placeholder="sexe">
    </label>
    <label for="dateNaissance">  <!-- Le champ de titre -->
        Ajouter un personne : 
        <input type="date" name="dateNaissance" placeholder="Date de naissance">
    </label>
    <label for="file">
        Ajouter une photo
        <input type="file" name="file">
    </label>

    <!-- CHECKBOX ACTEUR/REALISATEUR -->
    <!-- Acteur -->
    <input type="checkbox" id="acteur" name="acteur">
    <label for="acteur">Acteur</label> <br>
    <!-- Realisateur -->
    <input type="checkbox" id="realisateur" name="realisateur">
    <label for="realisateur">Réalisateur</label> <br>



    <input type="submit" name="submit" value="envoyer">

    <?php
    // Vérifier si un message de succès est défini
    if (isset($_SESSION['message'])) {
        // AFFICHER UN MESSAGE DE SUCCES
        echo '<div class="success">' . $_SESSION['message'] . '</div>';
        // Vider la variable pour ne pas l'afficher lors de la prochain chargement de page
        unset($_SESSION['message']);
    }
    ?>
    
</form>

<?php

$titre = "Ajouter une personne";
$titre_secondaire = "Ajouter une personne";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>