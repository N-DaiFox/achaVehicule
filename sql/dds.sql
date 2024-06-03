DROP DATABASE IF EXISTS achatvehicule;
CREATE DATABASE IF NOT EXISTS achatvehicule;
USE achatvehicule;
CREATE TABLE IF NOT EXISTS CARTESGRISES(
	id_personne 	int(11) 		NOT NULL 
    								AUTO_INCREMENT,
    immatriculation VARCHAR(8) 		NOT NULL,
    dateCarte 		date 			NOT NULL,
    PRIMARY KEY(id_personne, immatriculation)
);
CREATE TABLE IF NOT EXISTS proprietaires(
	id_personne 	int(11) 		NOT NULL 
    								AUTO_INCREMENT,
    nom 			varchar(30) 	NOT NULL,
    prenom 			varchar(50)		NOT NULL,
    adresse			varchar(50)		NOT NULL,
    ville			varchar(50)		NOT NULL,
    code_postal 	varchar(5)		NOT NULL,
    PRIMARY KEY(id_personne)
);
CREATE TABLE IF NOT EXISTS modeles(
	id_modele 		int(11) 		NOT NULL 
    								AUTO_INCREMENT,
    modele			varchar(30) 	NOT NULL,
    marque			varchar(20)		NOT NULL,
    carburant		varchar(15)		NOT NULL,
    PRIMARY KEY(id_modele)
);
CREATE TABLE IF NOT EXISTS voitures(
	immatriculation VARCHAR(8) 		NOT NULL,
    id_modele 		int(11) 		NOT NULL,
    couleur		char(2)			NOT NULL,
    datevoiture 	date			NOT NULL,
    PRIMARY KEY(immatriculation, id_modele)
);

ALTER TABLE voitures
	ADD CONSTRAINT fk_id_modele 	FOREIGN KEY (id_modele) 		REFERENCES MODELES(id_modele);
    
ALTER TABLE cartesgrises
	ADD CONSTRAINT id_personne 		FOREIGN KEY (id_personne)		REFERENCES PROPIERAIRES(id_personne),
    ADD CONSTRAINT immatriculation 	FOREIGN KEY (immatriculation) 	REFERENCES VOITURES(immatriculation);





ALTER TABLE modeles
	ADD CONSTRAINT CK_MODELES_carburant 	CHECK (carburant 	='essence' 	or carburant='diesel' 	or carburant='gpl' or carburant='électrique');
ALTER TABLE voitures
	ADD CONSTRAINT CK_VOITURES_couleur 		CHECK (couleur 		='CL' 		or couleur='MO' 		or couleur='FO');