<?php 
    ob_start(); 
?>

<h1>Ajouter un role</h1>
<form action="index.php?action=ajoutRole" method="post">
    <label for="nom">  <!-- Le champ de titre -->
        Ajouter un rôle : 
        <input type="text" name="nom" placeholder="Nom">
    </label>

    <input type="submit" name="submit" value="envoyer">
    
</form>

<?php

$titre = "Ajouter un rôle";
$titre_secondaire = "Ajouter un rôle";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>