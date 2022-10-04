# I - Northwind - Les requêtes
## 1 : Liste des clients français :
```sql
SELECT 
  CompanyName AS Société,
  ContactName AS Contact,
  ContactTitle AS Fonction,
  Phone AS Téléphone
FROM customers
WHERE Country = 'France';
```

## 2 : Liste des produits vendus par le fournisseur "Exotic Liquids" :
```sql
SELECT ProductName AS Produit, UnitPrice AS Prix
FROM products
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE CompanyName = 'Exotic Liquids';
```

## 3 : Nombre de produits mis à disposition par les fournisseurs français (tri par nombre de produits décroissant) :
```sql
SELECT CompanyName AS Fournisseur, COUNT(ProductID) AS Nbre_produits
FROM products
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE Country = 'France'
GROUP BY CompanyName
ORDER BY Nbre_produits DESC;
-- Les backticks ` (AltGr + 7) sont obligatoires si un nom de table ou un champ contient des espaces
```

## 4 : Liste des clients français ayant passé plus de 10 commandes :
```sql
SELECT CompanyName AS Client, COUNT(OrderID) AS Nbre_commandes
FROM orders
JOIN customers ON orders.CustomerID = customers.CustomerID
WHERE Country = 'France'
GROUP BY CompanyName
HAVING Nbre_commandes > 10;
```

## 5 : Liste des clients dont le montant cumulé de toutes les commandes passées est supérieur à 30000 € :
```sql
-- (NB: chiffre d'affaires (CA) = total des ventes)
SELECT CompanyName AS Client, SUM((UnitPrice*Quantity)-Discount) AS ca
FROM `order details`
JOIN orders ON `order details`.OrderID = orders.OrderID
JOIN customers ON orders.CustomerID = customers.CustomerID
GROUP BY CompanyName
HAVING ca > 30000
ORDER BY ca DESC;
```

## 6 : Ex 6 : Liste des pays dans lesquels des produits fournis par "Exotic Liquids" ont été livrés :
```sql
SELECT DISTINCT ShipCountry
FROM orders
JOIN `order details` ON orders.OrderID = `order details`.OrderID
JOIN products ON `order details`.ProductID = products.ProductID
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE CompanyName = 'Exotic Liquids'
ORDER BY ShipCountry;
```

## 7 :Ex 7 : Chiffre d'affaires global sur les ventes de 1997 :
```sql
-- (NB: chiffre d'affaires (CA) = total des ventes)
SELECT SUM((UnitPrice*Quantity)-Discount) AS `Montant ventes 97`
FROM `order details`
JOIN orders ON `order details`.OrderID = orders.OrderID
WHERE YEAR(OrderDate) = 1997;
```

## 8 : Ex 8 : Chiffre d'affaires détaillé par mois, sur les ventes de 1997 :
```sql
SELECT MONTH(OrderDate) AS `Mois 97`, SUM((UnitPrice*Quantity)-Discount) AS `Montant Ventes`
FROM `order details`
JOIN orders ON `order details`.OrderID = orders.OrderID
WHERE year(OrderDate) = 1997
GROUP BY `Mois 97`
ORDER BY `Mois 97`;
```

## 9 : A quand remonte la dernière commande du client nommé "Du monde entier" ?
```sql
SELECT MAX(OrderDate) AS `Date de la dernière commande`
FROM orders
JOIN customers ON orders.CustomerID = customers.CustomerID
WHERE CompanyName = 'Du monde entier';
```

## 10 : Quel est le délai moyen de livraison en jours ?
```sql
SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS `Délai moyen de livraison en jours`
FROM orders;
```

# II - Procédures stockées

## Requête 9 : Date de dernière commande
```sql
DELIMITER //
CREATE PROCEDURE date_derniere_commande()
BEGIN
  SELECT CompanyName, MAX(OrderDate) AS `Date de la dernière commande`
  FROM orders
  JOIN customers ON orders.CustomerID = customers.CustomerID
  WHERE LOWER(CompanyName) = LOWER(company_name);
END //
DELIMITER ;
```

## Requête 10 : Délai moyen de livraison
```sql
DELIMITER //
CREATE PROCEDURE delai_livraison_moyen()
BEGIN
  SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS `Délai moyen de livraison en jours`
  FROM orders;
END //
DELIMITER ;
```