# Exercice 1

    Sous PhpMyAdmin, après avoir sélectionné votre base Papyrus codez le script suivant et exécutez-le :
```sql
START TRANSACTION;

SELECT nomfou FROM fournis WHERE numfou=120;

UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120 

SELECT nomfou FROM fournis WHERE numfou=120 
```
    L'instruction START TRANSACTION est suivie d'une instruction UPDATE, mais aucune instruction COMMIT ou ROLLBACK correspondante n'est présente.


## Que concluez-vous ?

Les modifications ne sont pas effectives dans la base de données et elles ne sont pas annulées.

## Les données sont-elles modifiables par d'autres utilisateurs (ouvrez une nouvelle fenêtre de requête pour interroger le fournisseur 120 par une instruction SELECT) ?

Non.

## La transaction est-elle terminée ?

Non.

## Comment rendre la modification permanente ?

En utilisant l'instruction `COMMIT;`.

## Comment annuler la transaction ?

En utilisant l'instruction `ROLLBACK;`.


# Exercice 2

    Dans l'exercice précédent, nous avons vu que d'autres utilisateurs ne pouvaient pas accéder à l'interrogation de la ligne tant que la transaction n'était pas terminée.

## Pourquoi?

Selon les critères ACID, las transaction est `Isolée` : 

    Les données sont verrouillées : il n’est pas possible depuis une autre transaction de visualiser les données en cours de modification dans une transaction.

## Recommencez l'exécution du script de l'exercice précédent, puis ouvrez une nouvelle fenêtre (Ctrl N dans Heidi SQL), et essayez de vérouiller la fournis en ecriture.
```sql
LOCK TABLES fournis WRITE;
```
Pour dévérouliller les tables, utilisez la commande suivante:
```sql
UNLOCK TABLES;
```

## Interrogez le fournisseur 120. Que constatez-vous ? Expliquez.
```sql
SELECT nomfou FROM fournis WHERE numfou=120; 
```

