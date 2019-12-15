CREATE DATABASE 'projet' DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE usager (
	pseudonyme		VARCHAR(255),
	prenom			VARCHAR(255),
	nom				VARCHAR(255),
	mot_passe		VARCHAR(255),
	points			INT UNSIGNED,
	categorie_id 	INT,
	CONSTRAINT PK_pseudonyme PRIMARY KEY (pseudonyme),
	CONSTRAINT FK_categorieid FOREIGN KEY (categorie_id) REFERENCES categorie(id)
);

CREATE TABLE categorie (
	id 			INT,
	nom			VARCHAR(255),
	url			VARCHAR(255),
	image_id 	INT,
	CONSTRAINT PK_idcategorie PRIMARY KEY (id),
	CONSTRAINT FK_imageid FOREIGN KEY (image_id) REFERENCES image(id)
);

CREATE TABLE commentaires (
	id 					INT,
	commentaire 		VARCHAR(255),
	usager_pseudonyme 	VARCHAR(255),
	pointage 			INT,
	CONSTRAINT FK_usagerpseudo FOREIGN KEY (usager_pseudonyme) REFERENCES usager(pseudonyme)
);

CREATE TABLE images (
	id 			INT,
	url 		VARCHAR(255),
	titre_image VARCHAR(255),
	pointage 	INT
);