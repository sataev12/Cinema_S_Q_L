<?php ob_start(); ?>

<h1>Modifier un réalisateur</h1>
<form action="index.php?action=modifierRealisateur&id=<?= $idPersonne  ?>" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="<?= $nom ?>"><br><br>

    <label for="prenom">Prenom :</label>
    <input type="text" name="prenom" value="<?= $prenom ?>"><br><br>

    <label for="sexe">Sexe :</label>
    <input type="text" name="sexe" value="<?= $sexe ?>"><br><br>

    <label for="dateNaissance">Date de naissance :</label>
    <input type="date" name="dateNaissance" value="<?= $dateNaissance ?>"><br><br>

    <input type="submit" name="submit" value="Modifier">
</form>


<?php 
    $contenu = ob_get_clean();
    require "view/template.php"; 
?>