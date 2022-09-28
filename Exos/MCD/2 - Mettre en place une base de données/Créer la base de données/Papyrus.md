# BDD Papyrus
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
  unimes CHAR(5) NOT NULL,
);

CREATE TABLE fournis (
  numfou VARCHAR(25) PRIMARY KEY,
  nomfou VARCHAR(25) NOT NULL,
  ruefou VARCHAR(50) NOT NULL,
  posfou CHAR(5) NOT NULL,
  vilfou VARCHAR(30) NOT NULL,
  confou VARCHAR(15) NOT NULL,
  satisf TINYINT(2),
CHECK (satisf >-1 AND satisf < 11 )
);

CREATE INDEX numero_fournisseur ON entcom(num_fou);

CREATE TABLE entcom (
  numcom INT AUTO_INCREMENT PRIMARY KEY,
  numfou VARCHAR(25) REFERENCES fournis(numfou),
  obscom VARCHAR(50),
  datcom TIMESTAMP NOT NULL,
);

CREATE TABLE ligcom (
  numcom INT REFERENCES entcom(numcom),
  numlig TINYINT(3),
  codart CHAR(4) REFERENCES produit(codart),
  qtecde INT NOT NULL,
  priuni DECIMAL(9,2) NOT NULL,
  qteliv INT,
  derliv DATETIME NOT NULL,
  PRIMARY KEY (numcom, numlig),
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
  PRIMARY KEY (codart, numfou),
);
```