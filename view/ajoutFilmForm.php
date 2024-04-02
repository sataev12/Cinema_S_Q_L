<?php
    ob_start();
?>

<h1>Ajouter un film</h1>
<form  class="form-film" action="index.php?action=ajoutFilm" method="post" enctype="multipart/form-data">
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


    <!-- La liste deroulante pour les realisateur -->
    <label for="realisateur">
        Choisir le réalisateur
        <select name="Id_Realisateur">
            <?php foreach($realisateur as $realisateurOne) : ?>
                <option value="<?= $realisateurOne['Id_Realisateur']; ?>">
                    <?= $realisateurOne['Nom'] . ' ' . $realisateurOne['Prenom']; ?>
                </option>
            <?php endforeach; ?>    
        </select>
    
    </label>

    <label for="genres">Genres : </label>
    <?php
    // Affichage des cases à cocher pour les genres
    foreach ($genres as $genre) {
        echo '<input type="checkbox" name="genres[]" value="' . $genre['Id_Genre'] . '"> ' . $genre['Libelle'] . '<br>';
    }
    ?>


    <input type="submit" name="submit" value="envoyer">
</form>





<?php

$titre = "Ajouter une personne";
$titre_secondaire = "Ajouter une personne";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>
