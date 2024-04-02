<?php 
    ob_start(); 
?>





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
                            <td><a href='index.php?action=detailsFilm&id=<?= $film['Id_Film'] ?>'>Details de film</a><br>
                            <a href="index.php?action=modifierFilmForm&id=<?= $film['Id_Film'] ?>">Modifier</a>
                            <a href="index.php?action=supprimerFilm&id=<?= $film['Id_Film'] ?>">Supprimer</a>        
                    </div>
                <?php } ?>
            </div>
        </div>    
</div>



















<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>