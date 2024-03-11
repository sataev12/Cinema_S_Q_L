<?php 
    ob_start(); 
?>

<h1>Ajouter un Genre</h1>
<form action="index.php?action=ajoutGenre" method="post">
    <label for="Libelle">  <!-- Le champ de titre -->
        Genre : 
        <input type="text" name="Libelle" placeholder="libelle">
    </label>

    <input type="submit" name="submit" value="envoyer">
    
</form>

<?php

$titre = "Ajouter un genre";
$titre_secondaire = "Ajouter un genre";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>