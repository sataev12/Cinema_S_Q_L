<!-- ?php 
    ob_start(); 
    // $film = $requete->fetchAll();
    // $realistr = $requete->fetchAll(); 
    //     var_dump($realistr);
    //     die;
?>

<h1>Ajouter un film</h1>
<form action="index.php?action=ajoutFilm" method="post">
    <label for="Titre">  
        Nom du film : 
        <input type="text" name="titre" placeholder="Titre">
    </label>
    <label for="AnneSortFr"> 
        L'année de film : 
        <input type="number" name="AnneSortFr" placeholder="année de film">
    </label>
    <label for="Duree"> 
        La duree du film : 
        <input type="number" name="Duree" placeholder="Duree">
    </label>
    <label for="Synopsis"> 
        La duree du film : 
        <input type="text" name="Synopsis" placeholder="Synopsis">
    </label>
    <label for="Note"> 
        La duree du film : 
        <input type="number" name="Note" placeholder="Note">
    </label>
    <label for="Affiche">  
        La duree du film : 
        <input type="text" name="Affiche" placeholder="Affiche">
    </label>
    <select>
        ?php 
        // while ($realistr = $requete->fetch()) { 
            // echo "<option value='" . $realistr['Nom'] . "'>" . $realistr['Nom'] . "</option>";
        // }
        // ?>
    </select>
    <input type="submit" value="envoyer">
    
</form>



// $titre = "Ajouter un film";
// $titre_secondaire = "Ajouter un film";
// $contenu = ob_get_clean();
//Inclure le fichier
// require "view/template.php"; // -->