# Modèle physique
```sql
client = (client_id COUNTER, client_nom VARCHAR(50), client_prenom VARCHAR(50));
commande = (commande_id COUNTER, commande_date DATETIME, commande_montant DOUBLE, #client_id);
article = (article_id COUNTER, article_designation VARCHAR(50), article_prixunitaire DOUBLE);
comprend = (#commande_id, #article_id, quantite INT, tva_taux DECIMAL(15,2));
```

# Explications

## Associations
    • L’association « passe » : clé primaire « client_id » dans la table « commande » comme clé étrangère.
    • L’association « comprend » : devient une table qui va comprendre les clés étrangères « commande_id » et « article_id » qui constitueront une clé primaire.


## Clés primaires / étrangères
    • Les champs « client_id », « commande_id » et « article_id » sont des clés primaires qui représentent des identifiants uniques afin de facilement retrouver les objets recherchés, sans risque de doublons.
    • La table « comprend » contient une clé primaire composée des clés étrangères « commande_id » et « article_id ». Il ne peut donc y avoir de doublon dans la commande.

# SCRIPT
```sql
CREATE TABLE client(
   client_id COUNTER,
   client_nom VARCHAR(50),
   client_prenom VARCHAR(50),
   PRIMARY KEY(client_id)
);

CREATE TABLE commande(
   commande_id COUNTER,
   commande_date DATETIME,
   commande_montant DOUBLE,
   client_id INT NOT NULL,
   PRIMARY KEY(commande_id),
   FOREIGN KEY(client_id) REFERENCES client(client_id)
);

CREATE TABLE article(
   article_id COUNTER,
   article_designation VARCHAR(50),
   article_prixunitaire DOUBLE,
   PRIMARY KEY(article_id)
);

CREATE TABLE comprend(
   commande_id INT,
   article_id INT,
   quantite INT,
   tva_taux DECIMAL(15,2),
   PRIMARY KEY(commande_id, article_id),
   FOREIGN KEY(commande_id) REFERENCES commande(commande_id),
   FOREIGN KEY(article_id) REFERENCES article(article_id)
);
```
<!-- ![MCDEx2](/home/alex/AFPA/CDA/Exos/MCD/1 - Concevoir une base de données/Eval MCD/MCD Ex2.jpg) -->
<img src="/home/alex/AFPA/CDA/Exos/MCD/1 - Concevoir une base de données/Eval MCD/MCD Ex2.jpg">