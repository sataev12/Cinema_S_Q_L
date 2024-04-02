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
                <button id="prev" class="btn-next"><i class="fa-solid fa-arrow-left flech"></i></button>
                <!-- Bouton pour passer à la diapositive suivante -->
                <button id="next" class="btn-next"><i class="fa-solid fa-arrow-right flech"></i></button>
            </div>
            <!-- Conteneur pour les points de navigation -->
            <div class="carousel-dots"></div>
        </div>
    </div>
    <div class="global">
        <div class="decor"></div>
        <h1>Cinema</h1>
        <div class="agenda">
            <p>Agenda des sorties</p>
            <i class="fa-solid fa-plus"></i>
        </div>
        <div class="parent-decor-block">
            <div class="paren-decor">
                <div class="tre"></div>
                <p>Toujours à l'affiche</p>
            </div>    
            <div class="paren-decor">
                <div class="next-flesh nxt-droit "><i class="fa-solid fa-arrow-left flech"></i></div>
                <div class="next-flesh nxt-gauche "><i class="fa-solid fa-arrow-right flech"></i></div>
            </div>    
        </div>
        

        <div class="uk-table uk-table-striped" id="film-slider">
            
            <div class="tableAffiche filmSlide" >
                
                <?php
                    foreach($requete->fetchAll() as $Id => $film) { ?>
                        <div class="infoFilm" >
                            <div><a href='index.php?action=detailsFilm&id=<?= $film['Id_Film'] ?>'><?= $film['Titre'] ?></a></div>
                            <div><img class="imgFilm" src="./public/css/img/<?= $film["URLimg"] ?>"></div>        
                        </div>
                <?php } ?>
            </div>

            
        </div>
        <div class="decor"></div>
        <h1>Stars</h1>
        <div class="sous-titre">
            <p>Top Stars du jour sur TopFilms</p>
            <div class="btn-nxt">
                <div class="next-flesh right"><i class="fa-solid fa-arrow-left flech"></i></div>
                <div class="next-flesh left"><i class="fa-solid fa-arrow-right flech"></i></div>
            </div>
        </div>
        <div class="uk-table uk-table-striped" id="film-slider">
            <div class="tableAffiche tablActeur">
                <?php foreach($requeteTopActeurs as $acteur) { ?>
                    <?php if (!empty($acteur['Photo'])) { ?>
                        <div class="infoFilm">
                            <div><?= $acteur['Nom'] ?></div>
                            <div><img class="imgFilm" src="./public/css/img/<?= $acteur["Photo"] ?>"></div>        
                        </div>
                    <?php } ?>
                <?php } ?>
                    </div>
            </div>
                    </div>

            
                    </div>
        
    </div>

    <!-- Pour la version mobile  -->
    <div class="container-desktop">
        <div class="container-parent">
            <div class="decor-jaune"></div>
            <h3>Cinéma</h3>
            <div class="menu-block">
                <p>Agenda des sorties</p>
                <p>Kids</p>
                <p>Méuilleurs films</p>
                <p>Méuilleurs documentaires</p>
            </div>
            <div class="affiche-dynamique">
                <div class="cinema">
                    <div class="tre-affiche"></div>
                    <p>Toujours à l'affiche</p>
                    <div class="list-film-One">
                        <?php
                            foreach($requete->fetchAll() as $Id => $film) { ?>
                                <div class="infoFilm" >
                                    <div><a href='index.php?action=detailsFilm&id=<?= $film['Id_Film'] ?>'><?= $film['Titre'] ?></a></div>
                                    <div><img class="imgFilm" src="./public/css/img/<?= $film["URLimg"] ?>"></div>        
                                </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="acteur-affiche">
                    <div class="tre-affiche"></div>
                    <p>Stars</p>
                </div>
            </div>
        </div>
    </div>


    
    <?php

$titre = "Acceuil";
$titre_secondaire = "Acceuil";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>