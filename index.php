<?php
    session_start();
    ob_start();
use Controller\CinemaController;

spl_autoload_register(function ($class_name){
    include str_replace("\\",DIRECTORY_SEPARATOR, $class_name) . '.php';
});

$ctrlCinema = new CinemaController();
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "listFilms": $ctrlCinema->listFilms(); break;
        case "listActeurs": $ctrlCinema->listActeurs(); break;
        case "listRealisateur": $ctrlCinema->listRealisateur(); break;
        case "castingFilm": $ctrlCinema->castingFilm(); break;
        case "new": $ctrlCinema->new(); break;
        case "acteurPlusAgee": $ctrlCinema->acteurPlusAgee(); break;
        case "nbFilmGenre": $ctrlCinema->nbFilmGenre(); break;
        case "lesPlusLong": $ctrlCinema->lesPlusLong(); break;
        // case "ajoutFilmForm": $ctrlCinema->ajoutFilmForm(); break;
        // case "ajoutFilm": $ctrlCinema->ajoutFilm(); break;
        case "ajoutGenreForm": $ctrlCinema->ajoutGenreForm(); break;
        case "ajoutGenre": $ctrlCinema->ajoutGenre(); break;
        case "ajoutRoleForm": $ctrlCinema->ajoutRoleForm(); break;
        case "ajoutRole": $ctrlCinema->ajoutRole(); break;
        case "ajoutPersonneForm": $ctrlCinema->ajoutPersonneForm(); break;
        case "ajoutPersonne": $ctrlCinema->ajoutPersonne(); break;
        case "detailsFilm": $ctrlCinema->detailsFilm($id); break;
        case "acceuil" : $ctrlCinema->acceuil(); break;
        case "acteurCasting": $ctrlCinema->acteurCasting($id); break;
        case "realisateurCasting": $ctrlCinema->realisateurCasting($id); break;
        case "listGenre": $ctrlCinema->listGenre(); break;
        case "detailGenre": $ctrlCinema->detailGenre($id); break;
        case "listeRole": $ctrlCinema->listeRole(); break;
        case "detailRole": $ctrlCinema->detailRole($id); break;
        case "acteurFilmographie": $ctrlCinema->acteurFilmographie($id); break;
        case "realisateurInfo": $ctrlCinema->realisateurInfo($id); break;
        case "modifierPersonneForm": $ctrlCinema->modifierPersonneForm($id); break;
        case "modifierPersonne": $ctrlCinema->modifierPersonne($id); break;
        case "ajoutFilmForm": $ctrlCinema->ajoutFilmForm(); break;
        case "ajoutFilm": $ctrlCinema->ajoutFilm(); break;
        case "ajoutCastingForm": $ctrlCinema->ajoutCastingForm(); break;
        case "ajoutCasting": $ctrlCinema->ajoutCasting(); break;
        case "modifierRealisateurForm": $ctrlCinema->modifierRealisateurForm($id); break;
        case "modifierRealisateur": $ctrlCinema->modifierRealisateur($id); break;
        case "modifierFilmForm": $ctrlCinema->modifierFilmForm($id); break;
        case "modifierFilm": $ctrlCinema->modifierFilm($id); break;
        case "supprimerFilm": $ctrlCinema->supprimerFilm($id); break;
        case "supprimerGenre": $ctrlCinema->supprimerGenre($id); break;
        case "supprimerRole": $ctrlCinema->supprimerRole($id); break;
        case "supprimerActeur": $ctrlCinema->supprimerActeur($id); break;
        case "supprimerRoleActeur": $ctrlCinema->supprimerRoleActeur($id); break;
        case "supprimerFilmAct": $ctrlCinema->supprimerFilmAct($id); break;
        case "supprimerActeurPersonne": $ctrlCinema->supprimerActeurPersonne($id); break;
        
        
        $ctrlCinema->acceuil();
        // case "detailFilm": $ctrlCinema->detailFilm($id); break;
        // case "listActeurs": $ctrlCinema->listActeurs(); break;
    }
    
}
else {
    $ctrlCinema->acceuil();
}

