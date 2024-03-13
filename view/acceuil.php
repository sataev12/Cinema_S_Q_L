<?php 
    ob_start(); 
?>

<!-- Conteneur principal pour le carrousel -->
<!-- Conteneur principal pour le carrousel -->
<div class="container">
        <!-- Élément carrousel -->
        <div class="carousel">
            <!-- Conteneur interne pour les diapositives -->
            <div class="carousel-inner">
                <!-- Première diapositive -->
                <div class="slide">
                    <!-- Image de la première diapositive -->
                    <img src="./public/css/img/870x489_66103671.webp"
                        alt="Image 1">
                </div>
                <!-- Deuxième diapositive -->
                <div class="slide">
                    <!-- Image de la deuxième diapositive -->
                    <img src="./public/css/img/filmlegende.jpeg"
                        alt="Image 2">
                </div>
                <!-- Troisième diapositive -->
                <div class="slide">
                    <!-- Image de la troisième diapositive -->
                    <img src="./public/css/img/newsFillm.jpeg"
                        alt="Image 3">
                </div>
            </div>
            <!-- Conteneur pour les boutons de navigation -->
            <div class="carousel-controls">
                <!-- Bouton pour passer à la diapositive précédente -->
                <button id="prev">Précédent</button>
                <!-- Bouton pour passer à la diapositive suivante -->
                <button id="next">Suivant</button>
            </div>
            <!-- Conteneur pour les points de navigation -->
            <div class="carousel-dots"></div>
        </div>
    </div>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?>films</p>
<a href="index.php?action=detailsFilm">Voir les détails</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>TITRE</tr>
        <tr>Film</tr>
    </thead>
    <tbody class="tableAffiche" >
        
        <?php
            foreach($requete->fetchAll() as $Id => $film) { ?>
                <tr class="infoFilm" >
                    <td><?= $film["Titre"] ?></td>
                    <td><img class="imgFilm" src="<?= $film["URLimg"] ?>"></td>
                    <td>.<a href='index.php?action=detailsFilm&id=<?= $film['Id_Film'] ?>'>Details de film</a></td>
                    
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Acceuil";
$titre_secondaire = "Acceuil";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>