```sql
-- Le moteur de stockage par défaut lorsqu'une table est créée est MyIsam, généralement qui ne supporte pas les transactions. L'autre moteur de stockage le plus utilisé et qui supporte les transactions est le moteur InnoDB, il faut donc utiliser celui-ci. Pour changer le moteur de stockage d'une table, exécuter la requête :

ALTER TABLE nom_table ENGINE=InnoDB;
```