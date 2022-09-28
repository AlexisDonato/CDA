# Dictionnaire de données

## Table Client
Codification | Type | Contraintes
---------|----------| -----------
 client_id | INT AUTO_INCREMENT | PRIMARY KEY
 client_nom |   VARCHAR(50)
 client_prenom | VARCHAR(50)
 client_adresse | VARCHAR(150)
  

 ## Table Reservation
Codification | Type | Contraintes
---------|----------| -----------
 reservation_chambre_id | INT | FOREIGN KEY
 reservation_client_id | INT | FOREIGN KEY
 reservation_date | DATETIME
 reservation_datedebut | DATETIME
 reservation_datefin | DATETIME
 reservation_montantarrhes | DECIMAL
 reservation_prixtotal | DECIMAL


## Table Chambre
Codification | Type | Contraintes
---------|----------| -----------
 chambre_id | INT AUTO_INCREMENT | PRIMARY KEY
 chambre_hotel_id | INT | FOREIGN KEY
 chambre_capacite | INT
 chambre_type | VARCHAR(50)
 chambre_exposition | VARCHAR(50)
 chambre_degrecomfort | VARCHAR(50)


## Table Hotel
Codification | Type | Contraintes
---------|----------| -----------
 hotel_id | INT AUTO_INCREMENT | PRIMARY KEY
 hotel_station_id| INT | FOREIGN KEY
 hotel_nom | VARCHAR(50)
 hotel_adresse | VARCHAR(150)
 hotel_categorie | VARCHAR(50)
 hotel_capacite | INT


## Table Station
Codification | Type | Contraintes
---------|----------| -----------
 station_id | INT AUTO_INCREMENT | PRIMARY KEY
 station_nom | INT | VARCHAR(50)



# Script
```sql
DROP DATABASE IF EXISTS hotels;
CREATE DATABASE hotels; 
USE hotels;

CREATE TABLE station (
  station_id INT AUTO_INCREMENT PRIMARY KEY,
  station_nom VARCHAR(50),
);

CREATE TABLE hotel (
  hotel_id INT AUTO_INCREMENT PRIMARY KEY,
  hotel_station_id INT REFERENCES station(station_id),
  hotel_nom VARCHAR(50),
  hotel_categorie INT,
  hotel_adresse VARCHAR(50),
  hotel_capacite INT, 
);

CREATE TABLE chambre (
  chambre_id INT AUTO_INCREMENT PRIMARY KEY,
  chambre_hotel_id INT REFERENCES hotel(hotel_id),
  chambre_capacite INT,
  chambre_type VARCHAR(50),
);

CREATE TABLE client (
  client_id INT AUTO_INCREMENT PRIMARY KEY,
  client_nom VARCHAR(50),
  client_prenom VARCHAR(50),
  client_adresse VARCHAR(150),
);

CREATE TABLE reservation (
  reservation_id INT AUTO_INCREMENT PRIMARY KEY ,
  reservation_chambre_id INT REFERENCES chambre(chambre_id),
  reservation_client_id INT REFERENCES client(client_id),
  reservation_date DATETIME ,
  reservation_date_debut DATETIME ,
  reservation_date_fin DATETIME ,
  reservation_prix DECIMAL(6,2),
  reservation_arrhes DECIMAL(6,2),
);
```
