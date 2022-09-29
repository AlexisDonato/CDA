# Créer la base de données : utilisateurs et droits
```sql
CREATE USER 'util1'@'localhost' IDENTIFIED BY '1234';
CREATE USER 'util2'@'localhost' IDENTIFIED BY '1234';
CREATE USER 'util3'@'localhost' IDENTIFIED BY '1234';


GRANT ALL PRIVILEGES ON Papyrus.* TO 'util1'@'localhost';
GRANT SELECT ON Papyrus TO 'util2'@'localhost';
GRANT SELECT ON Papyrus.fournis TO 'util3'@'localhost';
```