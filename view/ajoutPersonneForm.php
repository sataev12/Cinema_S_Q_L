<?php 
    ob_start(); 
?>

<h1>Ajouter un personne</h1>
<form action="index.php?action=ajoutPersonne" method="post">
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

    <input type="submit" name="submit" value="envoyer">
    
</form>

<?php

$titre = "Ajouter un rôle";
$titre_secondaire = "Ajouter un rôle";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>