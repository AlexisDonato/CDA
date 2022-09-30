# Base hotel
## Ex1
```sql
CREATE VIEW v_hotels_stations AS
SELECT hotel_nom, station_nom FROM hotel
JOIN station ON hotel.hotel_station_id = station.station_id
ORDER BY hotel_nom;
```

## Ex2
```sql
CREATE VIEW v_chambres_hotels AS
SELECT hotel_nom, chambre_numero, chambre_capacite FROM chambre
JOIN hotel ON chambre.chambre_hotel_id = hotel.hotel_id
ORDER BY hotel_nom, chambre_numero;
```

## Ex3
```sql
CREATE VIEW v_reservations_clients AS
SELECT client_nom, client_prenom, reservation_date, reservation_date_debut, reservation_date_fin, chambre_numero, reservation_arrhes FROM reservation
JOIN client ON reservation.reservation_client_id = client.client_id
JOIN chambre ON reservation.reservation_chambre_id = chambre.chambre_id
ORDER BY client_nom;
```

## Ex4
```sql
CREATE VIEW v_chambres_hotels_stations AS
SELECT station_nom, hotel_nom, chambre_numero, chambre_capacite FROM chambre
JOIN hotel ON chambre.chambre_hotel_id = hotel.hotel_id
JOIN station ON hotel.hotel_station_id = station.station_id
ORDER BY station_nom, hotel_nom, chambre_numero;
```

## Ex5
```sql
CREATE VIEW v_reservations_clients_hotels AS
SELECT client_nom, client_prenom, reservation_date, reservation_date_debut, reservation_date_fin, hotel_nom, chambre_numero, reservation_arrhes FROM reservation
JOIN client ON reservation.reservation_client_id = client.client_id
JOIN chambre ON reservation.reservation_chambre_id = chambre.chambre_id
JOIN hotel ON chambre.chambre_hotel_id = hotel.hotel_id
ORDER BY client_nom;
```

# Base Papyrus
## Ex1
```sql
CREATE VIEW v_GlobalCde AS
SELECT codart, libart, sum(qtecde) AS QteTot, sum(qtecde*priuni) AS PrixTot FROM ligcom
JOIN produit ON ligcom.codart = produit.codart;
```

## Ex2
```sql
CREATE VIEW v_VentesI100 AS
SELECT vente.* FROM vente
JOIN produit ON vente.codart = produit.codart
WHERE vente.codart = 'I100';
```

## Ex3
```sql
CREATE VIEW v_VentesI100Grobrigan AS
SELECT * FROM v_VentesI100
WHERE numfou = '00120';
```