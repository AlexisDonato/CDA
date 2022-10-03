# Exercice 1 : création d'une procédure stockée sans paramètre
```sql
-- Créez la procédure stockée Lst_fournis correspondant à la requête n°2 (afficher le code des fournisseurs pour lesquels une commande a été passée).

DELIMITER |

CREATE PROCEDURE lst_fournis()

BEGIN
  SELECT DISTINCT fournis.numfou, nomfou, FROM entcom
  JOIN fournis ON entcom.numfou = fournis.numfou;
END //


DELIMITER ;
```

# Exercice 2 : création d'une procédure stockée avec un paramètre en entrée
```sql
-- Créer la procédure stockée Lst_Commandes, qui liste les commandes ayant un libellé particulier dans le champ obscom (cette requête sera construite à partir de la requête n°11).

DELIMITER //

CREATE OR REPLACE PROCEDURE Lst_Commandes(IN obs VARCHAR(50))

BEGIN
  SELECT entcom.numcom, nomfou, libart, (qtecde*priuni) AS sous_total FROM entcom
  JOIN fournis ON entcom.numfou = fournis.numfou
  JOIN ligcom ON entcom.numcom = ligcom.numcom
  JOIN produit ON ligcom.codart = produit.codart
  WHERE obscom LIKE CONCAT('%', obs, '%');
END //

DELIMITER ;
```


# Exercice 3 : création d'une procédure stockée avec plusieurs paramètres
```sql
-- Créer la procédure stockée CA_ Fournisseur, qui pour un code fournisseur et une année entrée en paramètre, calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée (cette requête sera construite à partir de la requête n°19).

DELIMITER //

CREATE OR REPLACE PROCEDURE CA_Fournisseur(IN founum VARCHAR(25), IN annee INT)

BEGIN
  SELECT nomfou, SUM(qtecde * priuni * 1.20) as CA FROM fournis
  JOIN entcom ON fournis.numfou = entcom.numfou
  JOIN ligcom ON entcom.numcom = ligcom.numcom
  WHERE entcom.numfou = founum
  AND YEAR(datcom) = annee;
END //

DELIMITER ;
```


# Requetes utiles
```sql
-- Exécutez la commande SQL suivante pour obtenir des informations sur cette procédure stockée :
SHOW CREATE PROCEDURE nom_procedure;

-- Lister les procédures stockées :
SHOW PROCEDURE STATUS;

-- Supprimer une procédure :
DROP PROCEDURE nom_procedure;
```