<?php 
    ob_start(); 
    
?>


<a href="page.php?action=details">Voir les détails</a>

<table class="uk-table uk-table-striped">
                <?php $castingfilm = $requete->fetchAll();?>
                <?php foreach ($castingfilm as $resultat) {
                        echo "Nom: " . $resultat['Nom'] . "<br>";
                        echo "Prénom: " . $resultat['Prenom'] . "<br>";
                        echo "Sexe: " . $resultat['Sexe'] . "<br>";
                        echo "Titre du film: " . $resultat['Titre'] . "<br>";
                        echo "URL de l'image: " . $resultat['URLimg'] . "<br>";
                        echo "<hr>";
    } ?>
    


<?php

$titre = "Casting des films";
$titre_secondaire = "Casting des films";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>