# BDD GesCom
```sql
DROP DATABASE IF EXISTS GesCom;
CREATE DATABASE GesCom;
USE GesCom;

CREATE TABLE suppliers (
  sup_id INT AUTO_INCREMENT PRIMARY KEY,
  sup_name VARCHAR(50) NOT NULL,
  sup_city VARCHAR(50) NOT NULL,
  sup_address VARCHAR(150) NOT NULL,
  sup_mail VARCHAR(75),
  sup_phone VARCHAR(12)
);

CREATE TABLE customers(
  cus_id INT AUTO_INCREMENT PRIMARY KEY,
  cus_lastname VARCHAR(50) NOT NULL,
  cus_firstname VARCHAR(50) NOT NULL,
  cus_address VARCHAR(150) NOT NULL,
  cus_zipcode CHAR(5) NOT NULL,
  cus_city VARCHAR(50) NOT NULL,
  cus_mail VARCHAR(75),
  cus_phone VARCHAR(12)
);

CREATE TABLE categories (
  cat_id INT  PRIMARY KEY,
  cat_name VARCHAR(50) NOT NULL,
  cat_parent_id INT REFERENCES categories(cat_id)
);

CREATE TABLE products (
  pro_id INT AUTO_INCREMENT PRIMARY KEY,
  pro_cat_id INT REFERENCES categories(cat_id),
  pro_sup_id INT REFERENCES suppliers(sup_id),
  pro_ref VARCHAR(10) NOT NULL,
  pro_name VARCHAR(200) NOT NULL,
  pro_desc TEXT(1000) NOT NULL,
  pro_price DECIMAL(6,2) NOT NULL,
  pro_stock SMALLINT(4),
  pro_color VARCHAR(30),
  pro_picture VARCHAR(50),
  pro_add_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  pro_update_date TIMESTAMP,
  pro_publish TINYINT(1) NOT NULL
);

CREATE UNIQUE INDEX product_reference ON products(pro_ref);

CREATE TABLE orders (
  ord_id INT AUTO_INCREMENT PRIMARY KEY,
  cus_id INT REFERENCES customers(cus_id),
  ord_order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  ord_ship_date DATETIME,
  ord_bill_date DATETIME,
  ord_reception_date DATETIME,
  ord_status VARCHAR(25) NOT NULL
);

CREATE TABLE details (
  det_id INT  PRIMARY KEY,
  pro_id INT REFERENCES products(pro_id),
  ord_id INT REFERENCES orders(ord_id),
  det_price DECIMAL(6,2) NOT NULL,
  det_quantity INT(5) NOT NULL,
  CHECK (det_quantity > 0 AND det_quantity < 101 ),
);
```