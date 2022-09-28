# Dictionnaire de données

```sql
Personne = (per_num INT AUTOINCREMENT PRIMARY KEY, per_nom varchar(50), per_prenom varchar(50), per_adresse varchar(150), per_ville varchar(100));
Groupe = (gro_num INT AUTOINCREMENT PRIMARY KEY, gro_libelle VARCHAR(50));
Appartient = (#per_num, #gro_num);
```

## Table Personne
Codification | Type | Contraintes
---------|----------| -----------
 per_num | INT AUTOINCREMENT | PRIMARY KEY
 per_nom |   VARCHAR(50)
 per_prenom |   VARCHAR(50)
 per_adresse | VARCHAR(150)
 per_ville | VARCHAR(100)

 ## Table Groupe
Codification | Type | Contraintes
---------|----------| -----------
 gro_num | INT AUTOINCREMENT | PRIMARY KEY
 gro_libelle |   VARCHAR(50)

## Table Apaprtient
Codification | Type | Contraintes
---------|----------| -----------
 gro_num | INT | FOREIGN KEY
 per_num | INT | FOREIGN KEY
  
# Script
```sql
DROP DATABASE groupes;  
CREATE DATABASE groupes;  
USE groupes;

CREATE TABLE personne (  
  per_num INT AUTO_INCREMENT PRIMARY KEY,  
  per_nom VARCHAR(50),  
  per_prenom VARCHAR(50),  
  per_adresse VARCHAR(100),  
  per_ville VARCHAR(50),  
);
  
CREATE TABLE groupe (  
  gro_num INT AUTO_INCREMENT PRIMARY KEY,  
  gro_libelle VARCHAR(50),  
);  

CREATE TABLE appartient (  
  per_num INT REFERENCES personne(per_num),  
  gro_num INT REFERENCES groupe(gro_num),  
  PRIMARY KEY(per_num, gro_num),  
);
```