CREATE DATABASE ProjetFinal DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE images (
	id 			INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	url 		VARCHAR(255),
	titre_image VARCHAR(255) NOT NULL,
	pointage 	INT,
	categorie_id INT
);

CREATE TABLE usager (
	pseudonyme		VARCHAR(255) NOT NULL,
	prenom			VARCHAR(255),
	nom				VARCHAR(255),
	mot_passe		VARCHAR(255) NOT NULL,
	moderateur		CHAR(1),
	points			INT UNSIGNED,
	CONSTRAINT ch_moderateur CHECK (moderateur IN ('Y', 'N')),
	CONSTRAINT PK_pseudonyme PRIMARY KEY (pseudonyme) 
);

CREATE TABLE commentaires (
	id 					INT,
	commentaire 		VARCHAR(255),
	usager_pseudonyme 	VARCHAR(255),
	numero 				INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CONSTRAINT FK_usagerpseudo FOREIGN KEY (usager_pseudonyme) REFERENCES usager(pseudonyme) 
	ON DELETE CASCADE
);
