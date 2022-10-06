```sql
-- Le moteur de stockage par défaut lorsqu'une table est créée est MyIsam, généralement qui ne supporte pas les transactions. L'autre moteur de stockage le plus utilisé et qui supporte les transactions est le moteur InnoDB, il faut donc utiliser celui-ci. Pour changer le moteur de stockage d'une table, exécuter la requête :

ALTER TABLE nom_table ENGINE=InnoDB;


-- Créer une table ARTICLES_A_COMMANDER avec les colonnes :
```
    - CODART : Code de l'article, voir la table produit
    - DATE : date du jour (par défaut)
    - QTE : à calculer

```sql
CREATE TABLE articles_a_commander (
  codart VARVARCHAR(4) REFERENCES produit(codart),
  date DATETIME,
  qte INT
);


-- Créer un déclencheur UPDATE sur la table produit : lorsque le stock physique devient inférieur ou égal au stock d'alerte, une nouvelle ligne est insérée dans la table ARTICLES_A_COMMANDER.
CREATE OR REPLACE TRIGGER commander AFTER UPDATE ON produit
FOR EACH ROW
BEGIN
  DECLARE new_qte INT;
  IF NEW.stkphy < NEW.stkale THEN
    SET new_qte = (
      SELECT sum(qte) FROM articles_a_commander
      WHERE codart = NEW.codart
    );
    SET new_qte = (NEW.stkale-NEW.stkphy-new_qte);
    INSERT INTO articles_a_commander (codart, qte) VALUES (NEW.codart, new_qte);
  END IF;

END //
```
