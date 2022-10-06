
# Dictionnaire de données

## Table User
Codification | Type | Contraintes | Règles
---------|----------| ----------- | -----
 user_id | INT AUTO_INCREMENT | PRIMARY KEY
 user_email | VARCHAR(150)
 user_password | VARCHAR(50)
 user_name | VARCHAR(100)
 user_lastname | VARCHAR(100)
 user_birthdate | DATETIME
 user_signindate | DATETIME
 | |
 user_country | LONGTEXT | | DC2Type:json
 user_adress | VARCHAR(150)
 user_zipcode | VARCHAR(150)
 | |
 user_delivery_country | LONGTEXT | | DC2Type:json
 user_delivery_adress | VARCHAR(150)
 user_delivery_zipcode | VARCHAR(150)
 | |
 user_phonenumber | VARCHAR(30)
 user_isverified | BOOLEAN
 user_roles | LONGTEXT | | DC2Type:json
 user_vat | DECIMAL(4,2) 
 | |
 user_pro | BOOLEAN
 user_pro_company_name | VARCHAR(50) 
 user_pro_duns | VARCHAR(50) | | DUNS = SIRET international (Data universal number system) 


## Table Supplier
Codification | Type | Contraintes | Règles
---------|----------| ----------- | -----
 supplier_id | INT AUTO_INCREMENT | PRIMARY KEY
 supplier_order_id | INT REFERENCES supplier(supplier_id)
 supplier_name | VARCHAR(50)

<!-- + adress, Phone, Responsable, SIRET.... -->

<!-- Rajouter une table Brand éventuellement -->

## Table Product
Codification | Type | Contraintes | Règles
---------|----------| ----------- | -----
 product_id | INT AUTO_INCREMENT | PRIMARY KEY
 product_supplier_id | INT REFERENCES supplier(supplier_id)
 product_category_id | INT REFERENCES category(category_id)
 product_name | VARCHAR(50) | | Ne pas oublier la brand dans le nom
 product_description | VARCHAR(150)
 product_price | INT
 product_content | VARCHAR(150)
 product_discount | DECIMAL(3,2)
 product_discount_price | DECIMAL(8,2)
 product_stock_quantity | INT | > 0 


## Table Category
Codification | Type | Contraintes | Règles
---------|----------| ----------- | -----
 category_id | INT AUTO_INCREMENT | PRIMARY KEY
 category_subcategory_id | INT REFERENCES category(category_id)
 category_name | VARCHAR(50)


## Table Cart
Codification | Type | Contraintes | Règles
---------|----------| ----------- | -----
 cart_id | INT AUTO_INCREMENT | PRIMARY KEY
 user_id | INT REFERENCES user(user_id)
 user_order_id | INT REFERENCES orderdetails(orderdetails_id)
 cart_validated | BOOLEAN
 order_date | DATETIME
 shipped | BOOLEAN
 shipment_date | DATETIME


## Table Order details
Codification | Type | Contraintes | Règles
---------|----------| ----------- | -----
 orderdetails_id | INT AUTO_INCREMENT | PRIMARY KEY
 product_id | INT REFERENCES product(product_id)
 cart_id | INT REFERENCES cart(cart_id)
 orderdetails_quantity | INT
 order_details_total | DOUBLE
 order_additional_discount | DECIMAL(3,2) | | Pour les commerciaux


# MLD
```sql
user = (user_id INT, user_email VARCHAR(150) , user_name VARCHAR(100) , user_lastname VARCHAR(100) , user_birthname DATETIME, user_adress VARCHAR(150) , user_zipcode VARCHAR(150) , user_signindate DATETIME, user_password VARCHAR(50) , user_delivery_adress VARCHAR(150) , user_delivery_country Longtext, user_country Longtext, user_delivery_zipcode VARCHAR(150) , user_phonenumber VARCHAR(30) , user_isverified BOOLEAN, _user_roles Longtext , user_pro BOOLEAN, user_vat DECIMAL(4,2)  );

supplier = (supplier_id INT, supplier_name VARCHAR(50) );

category = (category_id INT, category_name VARCHAR(50) , #category_parent_id*);

cart = (cart_id INT, cart_validated BOOLEAN, cart_order_date DATETIME, cart_shipped BOOLEAN, cart_shipment_date DATETIME, cart_delivery_adress VARCHAR(50) , cart_billing_delivery VARCHAR(50) , #user_id*);

product = (product_id INT, product_name VARCHAR(50) , product_description VARCHAR(150) , product_price INT, product_content VARCHAR(150) , product_discount DECIMAL(3,2)  , product_discount_price DECIMAL(8,2)  , product_stock_quantity INT, #category_id*, #supplier_id*);

order_details = (orderdetails_id INT, orderdetails_quantity INT, order_details_unit_price VARCHAR(50) , order_additional_discount DECIMAL(3,2)  , #cart_id*, #product_id*);
```

# Script SQL
```sql
CREATE TABLE user(
   user_id INT PRIMARY KEY,
   user_email VARCHAR(150)  NOT NULL,
   user_name VARCHAR(100),
   user_lastname VARCHAR(100),
   user_birthname DATETIME,
   user_adress VARCHAR(150),
   user_zipcode VARCHAR(150),
   user_signindate DATETIME,
   user_password VARCHAR(50),
   user_delivery_adress VARCHAR(150),
   user_delivery_country Longtext,
   user_country longtext,
   user_delivery_zipcode VARCHAR(150),
   user_phonenumber VARCHAR(30),
   user_isverified BOOLEAN,
   user_roles Longtext,
   user_pro BOOLEAN,
   user_vat DECIMAL(4,2)
);

CREATE TABLE supplier(
   supplier_id INT PRIMARY KEY,
   supplier_name VARCHAR(50)
);

CREATE TABLE category(
   category_id INT PRIMARY KEY,
   category_name VARCHAR(50),
   category_parent_id INT REFERENCES category(category_id)
);

CREATE TABLE cart(
   cart_id INT PRIMARY KEY,
   user_id INT REFERENCES user(user_id),
   cart_validated BOOLEAN,
   cart_order_date DATETIME,
   cart_shipped BOOLEAN,
   cart_shipment_date DATETIME,
   cart_delivery_adress VARCHAR(50),
   cart_billing_delivery VARCHAR(50)
);

CREATE TABLE product(
   product_id INT PRIMARY KEY,
   category_id INT REFERENCES supplier(supplier_id),
   supplier_id INT REFERENCES supplier(supplier_id),
   product_name VARCHAR(50),
   product_description VARCHAR(150),
   product_price INT NOT NULL,
   product_content VARCHAR(150),
   product_discount DECIMAL(3,2) ,
   product_discount_price DECIMAL(8,2) ,
   product_stock_quantity INT
);

CREATE TABLE order_details(
   orderdetails_id INT PRIMARY KEY,
   product_id INT REFERENCES product(product_id),
   cart_id INT REFERENCES cart(cart_id),
   orderdetails_quantity INT NOT NULL,
   order_details_unit_price VARCHAR(50),
   order_additional_discount DECIMAL(3,2)
);
```

<img src="/Fil_Rouge_MCD.jpg">