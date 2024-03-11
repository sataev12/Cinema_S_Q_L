#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Genre
#------------------------------------------------------------

CREATE TABLE Genre(
        Id_Genre Int NOT NULL AUTO_INCREMENT,
        Libelle  Varchar (250) NOT NULL
	,CONSTRAINT Genre_PK PRIMARY KEY (Id_Genre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Role
#------------------------------------------------------------

CREATE TABLE Role(
        id_role       Int NOT NULL AUTO_INCREMENT,
        NomPersonnage Varchar (50) NOT NULL
	,CONSTRAINT Role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        id_personne   Int  Auto_increment  NOT NULL ,
        Nom           Varchar (50) NOT NULL ,
        Prenom        Varchar (50) NOT NULL ,
        Sexe          Varchar (50) NOT NULL ,
        DateNaissance Date NOT NULL
	,CONSTRAINT Personne_PK PRIMARY KEY (id_personne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Acteurs
#------------------------------------------------------------

CREATE TABLE Acteurs(
        id_personne   Int NOT NULL AUTO_INCREMENT,
        Id_Acteur     Int NOT NULL ,
        CONSTRAINT Acteurs_PK PRIMARY KEY (id_personne,Id_Acteur)

	,CONSTRAINT Acteurs_Personne_FK FOREIGN KEY (id_personne) REFERENCES Personne(id_personne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Realisateur
#------------------------------------------------------------

CREATE TABLE Realisateur(
        id_personne    Int NOT NULL ,
        Id_Realisateur Int NOT NULL AUTO_INCREMENT,
        CONSTRAINT Realisateur_PK PRIMARY KEY (id_personne,Id_Realisateur)

	,CONSTRAINT Realisateur_Personne_FK FOREIGN KEY (id_personne) REFERENCES Personne(id_personne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Film
#------------------------------------------------------------

CREATE TABLE Film(
        Id_Film        Int NOT NULL AUTO_INCREMENT,
        Titre          Varchar (50) NOT NULL ,
        AnneSortFr     Int NOT NULL ,
        Duree          Int NOT NULL ,
        Synopsis       Text NOT NULL ,
        Note           Float NOT NULL ,
        Affiche        Text NOT NULL ,
      
        Id_Realisateur Int NOT NULL
	,CONSTRAINT Film_PK PRIMARY KEY (Id_Film)

	,CONSTRAINT Film_Realisateur_FK FOREIGN KEY (Id_Realisateur) REFERENCES Realisateur(Id_Realisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: genre_film
#------------------------------------------------------------

CREATE TABLE genre_film(
        Id_Genre Int NOT NULL AUTO_INCREMENT,
        Id_Film  Int NOT NULL
	,CONSTRAINT genre_film_PK PRIMARY KEY (Id_Genre,Id_Film)

	,CONSTRAINT genre_film_Genre_FK FOREIGN KEY (Id_Genre) REFERENCES Genre(Id_Genre)
	,CONSTRAINT genre_film_Film0_FK FOREIGN KEY (Id_Film) REFERENCES Film(Id_Film)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jouer
#------------------------------------------------------------

CREATE TABLE jouer(
        Id_Film     Int NOT NULL ,
        Id_Acteur   Int NOT NULL ,
        id_role     Int NOT NULL
	,CONSTRAINT jouer_PK PRIMARY KEY (Id_Film,id_personne,Id_Acteur,id_role)

	,CONSTRAINT jouer_Film_FK FOREIGN KEY (Id_Film) REFERENCES Film(Id_Film)
	,CONSTRAINT jouer_Acteurs0_FK FOREIGN KEY (Id_Acteur) REFERENCES Acteurs(Id_Acteur)
	,CONSTRAINT jouer_Role1_FK FOREIGN KEY (id_role) REFERENCES Role(id_role)
)ENGINE=InnoDB;

