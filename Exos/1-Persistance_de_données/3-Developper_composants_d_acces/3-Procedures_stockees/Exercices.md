# Exercice 1 : création d'une procédure stockée sans paramètre
```sql
-- Créez la procédure stockée Lst_fournis correspondant à la requête n°2 (afficher le code des fournisseurs pour lesquels une commande a été passée).

DELIMITER |

CREATE PROCEDURE lst_fournis(In ville Varchar(50))

BEGIN
   SELECT * numfou 
   FROM fournis
   WHERE 
END |

DELIMITER ;
```