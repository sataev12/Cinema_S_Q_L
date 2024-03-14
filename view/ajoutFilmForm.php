<?php
    ob_start();
?>

<h1>Ajouter un film</h1>
<form action="index.php?action=ajoutFilm" method="post" enctype="multipart/form-data">
    <label for="Titre">
        Ajouter un titre
        <input type="text" name="Titre" placeholder="titre">
    </label>
    <label for="AnneSortFr">
        Ajouter une année de sortie
        <input type="number" name="AnneSortFr" placeholder="année de sortie">
    </label>
    <label for="Duree">
        Ajouter une durée de film
        <input type="number" name="Duree" placeholder="La durée">
    </label>
    <label for="Synopsis">
        Ajouter un synopsis
        <input type="text" name="Synopsis" placeholder="Synopsis">
    </label>
    <label for="Note">
        Ajouter une note
        <input type="number" name="Note" placeholder="Note">
    </label>
    <label for="Affiche">
        Ajouter une affiche
        <input type="text" name="Affiche" placeholder="Affiche">
    </label>
    <label for="file">
        Ajouter une photo
        <input type="file" name="file">
    </label>



    <input type="submit" name="submit" value="envoyer">
</form>





<?php

$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean();
require "view/template.php";

?>