# Disctionnaire de données

## Table Abonne
Codification | Type | Contraintes
---------|----------| -----------
 abonne_id | INT AUTO_INCREMENT| PRIMARY KEY
 abonne_nom | VARCHAR (50) 
 abonne_prenom | VARCHAR (50)
 abonne_adresse | VARCHAR (150)
 abonne_numerotelephone | VARCHAR (20)
 abonne_dateabonnement | DATETIME


## Table Livre
Codification | Type | Contraintes
---------|----------| -----------
 livre_id | INT AUTO_INCREMENT| PRIMARY KEY
 livre_titre | VARCHAR (50) 
 livre_auteurid | VARCHAR (50) | FOREIGN KEY
 livre_editeurid | VARCHAR (150) | FOREIGN KEY
 livre_theme | VARCHAR (50) / INT
 livre_datemiserebut | DATETIME


## Table Emprunt
 Codification | Type | Contraintes | Règles
---------|----------| -----------|----------
 emprunt_id | INT AUTO_INCREMENT| PRIMARY KEY | 1 seul livre à la fois
 emprunt_livreid | VARCHAR (50) / INT | FOREIGN KEY
 emprunt_dateretour | DATETIME
 emprunt_datemax | DATETIME | | Date d’emprunt + 14 jours
 emprunt_daterelance1 | DATETIME
 emprunt_daterelance2 | DATETIME
 emprunt_daterelance3 | DATETIME | | l’abonné ne peut plus emprunter de livres


## Table Auteur
Codification | Type | Contraintes
---------|----------| -----------
 auteur_id | INT AUTO_INCREMENT| PRIMARY KEY
 auteur_nom | VARCHAR (50) 
 auteur_prenom | VARCHAR (50) 


## Table Editeur
Codification | Type | Contraintes
---------|----------| -----------
 editeur_id | INT AUTO_INCREMENT| PRIMARY KEY
 editeur_nom | VARCHAR (50) 


## Table Thème
Codification | Type | Contraintes
---------|----------| -----------
 theme_id | INT AUTO_INCREMENT| PRIMARY KEY
 theme_nom | VARCHAR (50) 
 theme_couleurid | VARCHAR (50) / INT | FOREIGN KEY


## Table Couleur
Codification | Type | Contraintes
---------|----------| -----------
 couleur_id | INT AUTO_INCREMENT| PRIMARY KEY
 couleur_nom | VARCHAR (50) 


# MCD

<img src="MCD Ex1.jpg">