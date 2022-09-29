# Script BDD commandes
```sql
DROP DATABASE IF EXISTS commandes;
CREATE DATABASE commandes;
USE commandes;

CREATE TABLE client (
  cli_num INT AUTO_INCREMENT PRIMARY KEY,
  cli_nom VARCHAR(50) NOT NULL,
  cli_adresse VARCHAR(50) NOT NULL,
  cli_tel VARCHAR(12) NOT NULL
);

CREATE UNIQUE INDEX nom_client ON client(cli_nom);

CREATE TABLE produit (
  pro_num INT AUTO_INCREMENT PRIMARY KEY,
  pro_libelle VARCHAR(50) NOT NULL,
  pro_description VARCHAR(50) DEFAULT NULL
);

CREATE TABLE commande (
  com_num INT AUTO_INCREMENT PRIMARY KEY,
  cli_num INT REFERENCES client(cli_num),
  com_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  com_obs VARCHAR(50) DEFAULT NULL
);

CREATE TABLE detail (
  com_num INT REFERENCES commande(com_num),
  pro_num INT REFERENCES produit(pro_num),
  est_qte INT NOT NULL,
  PRIMARY KEY (com_num, pro_num)
);
```

# Script BDD Papyrus
```sql
DROP DATABASE IF EXISTS Papyrus;
CREATE DATABASE Papyrus;
USE Papyrus;


CREATE TABLE produit (
  codart CHAR(4) PRIMARY KEY,
  libart VARCHAR(30) NOT NULL,
  stkale INT NOT NULL,
  stkphy INT NOT NULL,
  qteann INT NOT NULL,
  unimes CHAR(5) NOT NULL
);

CREATE TABLE fournis (
  numfou VARCHAR(25) PRIMARY KEY,
  nomfou VARCHAR(25) NOT NULL,
  ruefou VARCHAR(50) NOT NULL,
  posfou CHAR(5) NOT NULL CHECK (posfou RLIKE '^[0-9]{5}$'),
  vilfou VARCHAR(30) NOT NULL,
  confou VARCHAR(15) NOT NULL,
  satisf TINYINT(2) CHECK (satisf BETWEEN 0 and 10)
);

CREATE TABLE entcom (
  numcom INT AUTO_INCREMENT PRIMARY KEY,
  numfou VARCHAR(25) REFERENCES fournis(numfou),
  obscom VARCHAR(50),
  datcom TIMESTAMP NOT NULL
);

CREATE INDEX numero_fournisseur ON entcom(numfou);

CREATE TABLE ligcom (
  numcom INT REFERENCES entcom(numcom),
  numlig TINYINT(3),
  codart CHAR(4) REFERENCES produit(codart),
  qtecde INT NOT NULL,
  priuni DECIMAL(9,2) NOT NULL,
  qteliv INT,
  derliv DATETIME NOT NULL,
  PRIMARY KEY (numcom, numlig)
);

CREATE TABLE vente (
  codart CHAR(4) REFERENCES produit(codart),
  numfou VARCHAR(25) REFERENCES fournis(numfou),
  delliv SMALLINT NOT NULL,
  qte1 INT NOT NULL,
  prix1 DECIMAL(9,2) NOT NULL,
  qte2 INT,
  prix2 DECIMAL(9,2),
  qte3 INT,
  prix3 DECIMAL(9,2),
  PRIMARY KEY (codart, numfou)
```

# Script Gestion Utilisateurs

```sql
CREATE USER 'util1'@'localhost' IDENTIFIED BY '1234';
CREATE USER 'util2'@'localhost' IDENTIFIED BY '1234';
CREATE USER 'util3'@'localhost' IDENTIFIED BY '1234';


GRANT ALL PRIVILEGES ON Papyrus.* TO 'util1'@'localhost';
GRANT SELECT ON Papyrus TO 'util2'@'localhost';
GRANT SELECT ON Papyrus.fournis TO 'util3'@'localhost';
```

# Script d'alimentation de la BDD Papyrus
```sql
INSERT INTO Papyrus.produit (CODART, LIBART, STKALE, STKPHY, QTEANN, UNIMES)
VALUES
    ('I100', 'Papier 1 ex continu', 100, 557, 3500, 'B1000'),
    ('I105', 'Papier 2 ex continu', 75, 5, 2300, 'B1000'),
    ('I108', 'Papier 3 ex continu', 200, 557, 3500, 'B500'),
    ('I110', 'Papier 4 ex continu', 10, 12, 63, 'B400'),
    ('P220', 'Pré imprimé commande', 500, 2500, 24500, 'B500'),
    ('P230', 'Pré imprimé facture', 500, 250, 12500, 'B500'),
    ('P240', 'Pré imprimé bulletin paie', 500, 3000, 6250, 'B500'),
    ('P250', 'Pré imprimé livraison', 500, 2500, 24500, 'B500'),
    ('P270', 'Pré imprimé bon fabrication', 500, 2500, 24500, 'B500'),
    ('R080', 'Ruban Espon 850', 10, 2, 120, 'unité'),
    ('R132', 'Ruban imp1200 lignes', 25, 200, 182, 'unité'),
    ('B002', 'Bande magnétique 6250', 20, 12, 410, 'unité'),
    ('B001', 'Bande magnétique 1200', 20, 87, 240, 'unité'),
    ('D035', 'CD R slim 80 mm', 40, 42, 150, 'B010'),
    ('D050', 'CD R-W 80mm', 50, 4, 0, 'B010');

INSERT INTO Papyrus.fournis (NUMFOU, NOMFOU, RUEFOU, POSFOU, VILFOU, CONFOU, SATISF)
VALUES
    ('00120', 'GROBRIGAN', '20 Rue du papier', '92200', 'Papercity', 'Georges', 08),
    ('00540', 'ECLIPSE', '53 Rue lasse flotter les rubans', '78250', 'Bugbugville', 'Nestor', 07),
    ('08700', 'MEDICIS', '120 Rue des plantes', '75014', 'Paris', 'Lison', NULL),
    ('09120', 'DISCOBOL', '11 Rue des sports', '85100', 'La Roche sur Yon', 'Hercule', 08),
    ('09150', 'DEPANPAP', '26 Avenue des locomotives', '59987', 'Coroncountry', 'Pollux', 05),
    ('09180', 'HURRYTAPE', '68 Boulevard des octets', '04044', 'Dumpville', 'Track', NULL);

INSERT INTO Papyrus.vente (CODART, NUMFOU, DELLIV, QTE1, PRIX1, QTE2, PRIX2, QTE3, PRIX3)
VALUES
    ('I100', '00120', 70, 0, '710', 60, '630', 100, '600'),
    ('I100', '00540', 90, 0, '700', 50, '600', 120, '500'),
    ('I100', '09120', 60, 0, '800', 70, '600', 90, '500'),
    ('I100', '09150', 90, 0, '650', 90, '600', 200, '590'),
    ('I100', '09180', 30, 0, '720', 50, '670', 100, '490'),
    ('I105', '00120', 90, 10, '705', 50, '630', 120, '500'),
    ('I105', '00540', 70, 0, '810', 60, '645', 100, '600'),
    ('I105', '09150', 90, 0, '685', 90, '600', 200, '590'),
    ('I105', '08700', 30, 0, '720', 50, '670', 100, '510'),
    ('I108', '00120', 90, 5, '795', 30, '720', 100, '680'),
    ('I108', '09120', 60, 0, '920', 70, '820', 100, '780'),
    ('I110', '09180', 90, 0, '900', 70, '870', 90, '835'),
    ('I110', '09120', 60, 0, '950', 70, '850', 90, '790'),
    ('D035', '00120', 0, 0, '40', NULL, NULL, NULL, NULL),
    ('D035', '09120', 5, 0, '40', 100, '30', NULL, NULL),
    ('I105', '09120', 8, 0, '37', NULL, NULL, NULL, NULL),
    ('P220', '00120', 15, 0, '3700', 100, '3500', NULL, NULL),
    ('P230', '00120', 30, 0, '5200', 100, '5000', NULL, NULL),
    ('P240', '00120', 15, 0, '2200', 100, '2000', NULL, NULL),
    ('P250', '00120', 30, 0, '1500', 100, '1400', 500, '1200'),
    ('P250', '09120', 30, 0, '1500', 100, '1400', 500, '1200'),
    ('P220', '08700', 20, 50, '3500', 100, '3350', NULL, NULL),
    ('P230', '08700', 60, 0, '5000', 50, '4900', NULL, NULL),
    ('R080', '09120', 10, 0, '120', 100, '100', NULL, NULL),
    ('R132', '09120', 5, 0, '275', NULL, NULL, NULL, NULL),
    ('B001', '08700', 15, 0, '150', 50, '145', 100, '185'),
    ('B002', '08700', 15, 0, '210', 50, '145', 100, '185');

INSERT INTO Papyrus.entcom (NUMCOM, OBSCOM, NUMFOU, DATCOM)
VALUES
    (70010, NULL, '00120', '2007-02-10'),
    (70011, 'Commande urgente', '00540', '2007-03-01'),
    (70020, NULL, '09180', '2007-04-25'),
    (70025, 'Commande urgente', '09150', '2007-04-30'),
    (70210, 'Commande cadencée', '00120', '2007-05-05'),
    (70300, NULL, '09120', '2007-06-06'),
    (70250, 'Commande cadencée', '08700', '2007-10-02'),
    (70620, NULL, '00540', '2007-10-02'),
    (70625, NULL, '00120', '2007-10-09'),
    (70629, NULL, '09180', '2007-10-12');

INSERT INTO Papyrus.ligcom (NUMLIG, QTECDE, PRIUNI, QTELIV, DERLIV, NUMCOM, CODART)
VALUES
    (01, 3000, '470', 3000, '2007-03-15', 70010, 'I100'),
    (02, 2000, '485', 2000, '2007-07-05', 70010, 'I105'),
    (03, 1000, '680', 1000, '2007-08-20', 70010, 'I108'),
    (04, 200, '40', 250, '2007-02-20', 70010, 'D035'),
    (05, 6000, '3500', 6000, '2007-03-31', 70010, 'P220'),
    (06, 6000, '2000', 2000, '2007-03-31', 70010, 'P240'),
    (07, 6000, '2000', 2000, '2007-05-16', 70011, 'I105'),
    (08, 200, '140', NULL, '2007-12-31', 70020, 'B001'),
    (09, 200, '140', NULL, '2007-12-31', 70020, 'B002'),
    (10, 1000, '590', 1000, '2007-05-15', 70025, 'I100'),
    (11, 500, '590', 500, '2007-05-15', 70025, 'I105'),
    (12, 1000, '470', 1000, '2007-07-15', 70210, 'I100'),
    (13, 10000, '3500', 10000, '2007-08-31', 70210, 'P220'),
    (14, 50, '790', 50, '2007-10-31', 70300, 'I110'),
    (15, 15000, '4900', 12000, '2007-12-15', 70250, 'P230'),
    (16, 10000, '3350', 10000, '2007-11-10', 70250, 'P220'),
    (17, 200, '600', 200, '2007-11-01', 70620, 'I105'),
    (18, 1000, '470', 1000, '2007-10-15', 70625, 'I100'),
    (19, 10000, '3500', 10000, '2007-10-31', 70625, 'P220'),
    (20, 200, '140', NULL, '2007-12-31', 70629, 'B001'),
    (21, 200, '140', NULL, '2007-12-31', 70629, 'B002');
    ```