CREATE DATABASE clubrock ; 
USE DATABASE clubrock ;

CREATE TABLE membres ( 
uid INT UNSIGNED NOT NULL AUTO_INCREMENT,
nom varchar(20), 
prenom varchar(20),
pseudo varchar(20),
maill varchar(20),
mdp varchar (20),
telephone varchar (10),
statut_ens varchar (20), /* auditeur exterieur personnel eleve doctorant */
statut_bde varchar (1), /* 1 ou NULL */
paiement_s1 varchar (2), /* ok ou NULL */
paiement_s2 varchar (2), /* idem */
rock varchar (4) , /* deb, inter, av */
salsa varchar (4), /* idem */
west_coast varchar(4),
salon varchar (4),
liste_diffusion char(1), /* 1 si le demande est faite, NULL sinon */
date_creation date , /* Préciser le format */
date_maj date,
photo varchar(20),  /* Préciser le format */ 
PRIMARY KEY ( uid ) ) ;

/* Il manque la photo ... */


/* Pour vérifier que tout est bien */

SHOW tables ;
DESCRIBE membres ;
