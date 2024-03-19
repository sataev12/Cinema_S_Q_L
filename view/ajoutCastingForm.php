<?php
    ob_start();
?>


<h1>Ajouter un casting</h1>
<form action="index.php?action=ajoutCasting" method="post">
    <label for="filmTitre">
        Film
        <select name="Id_Film">
            <?php foreach($titreFilm as $titreFilmOne) : ?>
                <option value="<?= $titreFilmOne['Id_Film']; ?>">
                    <?= $titreFilmOne['Titre'] ?>
                </option>
            <?php endforeach; ?>    
        </select>
    </label>
    <label for="ActeurFilm">
        Acteur
        <select name="Id_Acteur">
            <?php foreach($nomActeurs as $nomActeur) : ?>
                <option value="<?= $nomActeur['Id_Acteur']; ?>">
                    <?= $nomActeur['Nom'] ?>
                </option>
            <?php endforeach; ?>    
        </select>
    </label>
    <label for="Role">
        Rôle
        <select name="id_role">
            <?php foreach($requeteRoles as $requeteRole) : ?>
                <option value="<?= $requeteRole['id_role']; ?>">
                    <?= $requeteRole['NomPersonnage'] ?>
                </option>
            <?php endforeach; ?>    
        </select>
    </label>

    <input type="submit" name="submit" value="envoyer">
</form>


<?php
$contenu = ob_get_clean();
require "view/template.php";
?>