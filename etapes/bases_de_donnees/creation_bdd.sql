/* Creation d'une base de données qui regroupera toutes les tables du site */

CREATE DATABASE clubrock ; 

/*Creation d'un utilisateur ayant tous les droits sur les tables de cette base */

CREATE USER "clubrock_admin"@"localhost";
SET password FOR "clubrock_admin"@"localhost" = password('chachacha') ;
GRANT ALL ON clubrock.* TO  "clubrock_admin"@"localhost" ;

/*Creation des tables */

USE DATABASE clubrock ;

CREATE TABLE clubrock_membres ( 
uid INT UNSIGNED NOT NULL AUTO_INCREMENT,
nom varchar(20), 
prenom varchar(20),
pseudo varchar(20),
mail varchar(50),
mdp varchar (50),
telephone varchar (20),
statut_ens enum ('auditeur','exterieur','personnel','doctorant','eleve'), 
statut_bde enum ('1','0'), 
paiement_s1 enum ('1','0') default '0',
paiement_s2 enum ('1','0') default '0', /* idem */
rock enum ('deb','inter','av','nul') , /* deb, inter, av */
salsa enum ('deb','inter','av','nul') , /* idem */
west_coast enum ('deb','inter','av','nul'),
salon enum ('deb','inter','av','nul'),
liste_diffusion enum ('1','0'), 
date_creation date , /* Préciser le format */
date_maj date,
photo varchar(20), 
PRIMARY KEY ( uid ) ) ;

/* Table des billets */ 

CREATE TABLE clubrock_billets (
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id),
date_publication date, /* CURDATE() -> date courante */
titre varchar (255),
categorie enum('organisation', 'stage', 'sortie', 'info', 'projecteur'),
resume BLOB,
contenu BLOB,
image varchar(255),
statut enum('brouillon', 'publie'));




/* Pour vérifier que tout est bien */

SHOW tables ;
DESCRIBE clubrock_membres ;

/* Creation d'une table pour faire des tests */

CREATE TABLE test ( nom varchar(50), mdp varchar(10) ) ;

