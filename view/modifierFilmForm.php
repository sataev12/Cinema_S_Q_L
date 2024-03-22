<?php ob_start();?>
<h1>Modifier un film</h1>

<form action="index.php?action=modifierFilm&id=<?= $Id_Film ?>" method="post" enctype="multipart/form-data">
    <label for="Titre">Titre :</label>
    <input type="text" name="Titre" value="<?= $film['Titre'] ?>"><br><br>

    <label for="AnneSortFr">Année de sortie :</label>
    <input type="text" name="AnneSortFr" value="<?= $film['AnneSortFr'] ?>"><br><br>

    <label for="Duree">Durée :</label>
    <input type="text" name="Duree" value="<?= $film['Duree'] ?>"><br><br>

    <label for="Synopsis">Synopsis :</label><br>
    <textarea name="Synopsis" rows="4" cols="50"><?= $film['Synopsis'] ?></textarea><br><br>

    <label for="Note">Note :</label>
    <input type="text" name="Note" value="<?= $film['Note'] ?>"><br><br>

    <label for="Affiche">Affiche :</label>
    <input type="text" name="Affiche" value="<?= $film['Affiche'] ?>"><br><br>

    <label for="Id_Realisateur">Réalisateur :</label>
    <select name="Id_Realisateur">
        <?php foreach ($realisateurs as $real) : ?>
            <option value="<?= $real['id_personne'] ?>" <?= ($real['id_personne'] == $film['Id_Realisateur']) ? 'selected' : '' ?>>
                <?= $real['Nom'] . ' ' . $real['Prenom'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="genres">Genres :</label><br>
    <?php foreach ($genresDisponibles as $genre) : ?>
        <input type="checkbox" name="genres[]" value="<?= $genre['Id_Genre'] ?>" <?= (in_array($genre['Id_Genre'], $genresFilm)) ? 'checked' : '' ?>>
        <?= $genre['Libelle'] ?><br>
    <?php endforeach; ?><br>

    <label for="file">Photo :
        <input type="file" name="file"><br><br>
    </label>
    
    <input type="submit" name="submit" value="Modifier">
</form>

<?php $contenu = ob_get_clean(); ?>
<?php require "view/template.php"; ?>







<!-- ------------ -->


