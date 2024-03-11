-- Information d'un film : titre, année, durée et réalisateur
SELECT Film.Titre, Film.AnneSortFr, SEC_TO_TIME(Film.Duree * 60) AS Duree_formatée, Personne.Nom, Personne.Prenom
FROM Film
INNER JOIN Realisateur ON Film.Id_Realisateur = Realisateur.Id_Realisateur
INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
-- SELECT FORMAT(temps, 'HH:mm') AS heure_formatée FROM votre_table;
-- Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)
SELECT Film.Titre, SEC_TO_TIME(Film.Duree * 60) AS Duree_formatée
FROM Film 
WHERE Film.Duree > 135
ORDER BY Duree_formatée DESC;
-- Liste des films d'un réalisateur (en précisant l'année de sortie)
SELECT Personne.Nom, Personne.Prenom, Film.Titre, Film.AnneSortFr
FROM Realisateur
INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne
INNER JOIN Film ON Realisateur.Id_Realisateur = Film.Id_Realisateur
-- Nombre de film par genre (classés dans l'ordre décroissant)
SELECT Genre.Libelle, COUNT(Film.Id_Film) AS NbFilms
FROM genre_film
INNER JOIN Genre ON genre_film.Id_Genre = Genre.Id_Genre
INNER JOIN Film ON genre_film.Id_Film = Film.Id_Film
GROUP BY Genre.Libelle
-- Nombre de films par réalisateur (classés dans l'ordre décroissant)
SELECT Personne.Nom, COUNT(Film.Titre) AS NbFilmsParRealistr
FROM Realisateur
INNER JOIN Personne ON Realisateur.Id_Realisateur = Personne.id_personne
INNER JOIN Film ON Realisateur.Id_Realisateur = Film.Id_Realisateur
GROUP BY Personne.Nom
-- Casting d'un film en particulier (id_film) : nom, prénom des acteur + sexe
SELECT DISTINCT Personne.Nom, Personne.Prenom, Personne.Sexe, Film.Titre
FROM jouer
INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
-- Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l'année de sortie 
-- (du film le plus récent au plus ancien)
SELECT Personne.Nom, Personne.Prenom, Role.NomPersonnage, Film.AnneSortFr
FROM jouer
INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
INNER JOIN Role ON jouer.id_role = Role.id_role
INNER JOIN Film ON jouer.Id_Film = Film.Id_Film
WHERE Acteurs.Id_Acteur = 1
ORDER BY Film.AnneSortFr DESC
-- Liste des personnes qui sont à la fois acteurs et réalisateurs
SELECT Personne.Nom, Personne.Prenom 
FROM Acteurs 
INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne 
WHERE Personne.id_personne IN (
        SELECT Realisateur.id_personne 
        FROM Realisateur 
        INNER JOIN Personne ON Realisateur.id_personne = Personne.id_personne);
-- Liste des films qui ont moins de 5 ans(classés du plus récent au plus ancien)
SELECT Titre, AnneSortFr 
FROM Film 
WHERE AnneSortFr > YEAR(CURRENT_DATE) - 5 
ORDER BY AnneSortFr DESC;
-- Nombre d'hommes et de femmes parmis les acteurs
SELECT Personne.Sexe,COUNT(Acteurs.id_personne) AS nbFemmeHomme
FROM Acteurs
INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
GROUP BY Personne.Sexe
-- Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)
SELECT Personne.Nom, Personne.Prenom, ROUND((DATEDIFF('2024-02-29', Personne.DateNaissance) / 365), 0) AS DiffAge
FROM Acteurs
INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
HAVING DiffAge > 50;
-- Acteurs ayant joué dans 3 films ou plus
SELECT Personne.Nom AS ActeurJoueDans, COUNT(Acteurs.Id_Acteur) AS nbFilm
FROM jouer
INNER JOIN Acteurs ON jouer.Id_Acteur = Acteurs.Id_Acteur
INNER JOIN Personne ON Acteurs.id_personne = Personne.id_personne
GROUP BY Personne.Nom
HAVING nbFilm = 3






