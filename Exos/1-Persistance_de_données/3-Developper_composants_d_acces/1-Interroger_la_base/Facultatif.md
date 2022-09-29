# Ex1
```sql
    REPRESENTATION (id, titre, lieu)
```
## Liste des représentations
```sql
    SELECT titre FROM REPRESENTATION;
```
## Opéra Bastille 
```sql
    SELECT titre FROM REPRESENTATION
    WHERE lieu = 'Opéra Bastille';
```
# Ex2
```sql
    ETUDIANT (id, nom, prenom)
    MATIERE (id, libelle, coeff)
    EVALUER (id_etudiant, id_matiere, date, note)
```
## Total d'étudiants 
```sql
    SELECT COUNT(*) AS nb_d_etudiants FROM ETUDIANT;
```
## Note la plus haute et note la plus basse 
```sql
    SELECT min(note), max(note) FROM EVALUER;
```
## Moyenne de chaque étudiant dans chacune des matières 
```sql
    SELECT nom, prenom, libelle, avg(note) as moyenne FROM EVALUER
    JOIN MATIERE ON EVALUER.id_matiere = MATIERE.id
    JOIN ETUDIANT ON EVALUER.id_etudiant = ETUDIANT.id
    GROUP BY etudiant.id, matiere.id;
```
## Moyennes 
```sql
    SELECT libelle, avg(note) as moyenne FROM EVALUER
    JOIN MATIERE ON EVALUER.id_matiere = MATIERE.id
    GROUP BY matiere.id;
```
## Moyenne générale
```sql
    SELECT nom, prenom, sum(note*coeff)/sum(coeff) as moyenne FROM EVALUER
    JOIN MATIERE ON EVALUER.id_matiere = MATIERE.id
    JOIN ETUDIANT ON EVALUER.id_etudiant = ETUDIANT.id
    GROUP BY etudiant.id
    ORDER BY nom;
```
## Moyenne générale de la promotion 
```sql
SELECT sum(note*coeff)/sum(coeff) as moyenne_generale FROM EVALUER
JOIN MATIERE ON EVALUER.id_matiere = MATIERE.id;
```
## EMoyenne supérieure ou égale à la moyenne générale de la promotion 
```sql
SELECT nom, prenom, sum(note*coeff)/sum(coeff) AS moyenne_generale FROM EVALUER
JOIN MATIERE ON EVALUER.id_matiere = MATIERE.id
JOIN ETUDIANT ON EVALUER.id_etudiant = ETUDIANT.id
GROUP BY ETUDIANT.id
HAVING moyenne_generale >= (
  SELECT sum(note*coeff)/sum(coeff) FROM EVALUER
  JOIN MATIERE ON EVALUER.id_matiere = MATIERE.id
)
ORDER BY moyenne_generale DESC;
```

# Ex3

    EQUIPE (id, nom_equipe, directeur_sportif)
    COUREUR (id, nom_coureur, id_equipe, id_pays)
    PAYS (id, nom_pays)
    TYPE_ETAPE (id, libelle_type)
    ETAPE (id, date_etape, ville_dep, ville_arr, nb_km, id_type_etape)
    PARTICIPER (id_coureur, id_etape, temps_realise)
    ATTRIBUER_BONIFICATION (id_etape, km, rang, nb_secondes, id_coureur)

# Equipe Festina 
```sql
SELECT id, nom, nom_pays FROM COUREUR
JOIN EQUIPE on COUREUR.id_equipe = EQUIPE.id
JOIN PAYS on COUREUR.id_pays = PAYS.id
WHERE nom_equipe = 'Festina';
```
## Kms Tour de France 
```sql
SELECT sum(nb_km) AS total_km FROM ETAPE;
```
## Kms "Haute Montagne" 
```sql
SELECT sum(nb_km) AS total_km FROM ETAPE
JOIN TYPE_ETAPE ON ETAPE.id_type_etape = TYPE_ETAPE.id
WHERE libelle_type = 'Haute Montagne';
```
## Classement
```sql
SELECT nom, id_equipe, id_pays, sum(temps_realise) AS temps, FROM COUREUR
JOIN PARTICIPER on COUREUR.id = PARTICIPER.id_coureur
GROUP BY PARTICIPER.id_coureur
ORDER BY temps;
```