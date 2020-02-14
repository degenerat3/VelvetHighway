CREATE USER shopadmin IDENTIFIED BY 'velvet_admin';
CREATE DATABASE shop;

USE shop;

  CREATE TABLE orders (
    id SERIAL PRIMARY KEY,
    firstname VARCHAR (30) NOT NULL,
    lastname VARCHAR (30) NOT NULL,
    email VARCHAR (50) NOT NULL,
    prodid INT,
    ccnum VARCHAR (16),
    cvv VARCHAR (3),
    shipped BOOLEAN not null default false
  );

ALTER TABLE orders AUTO_INCREMENT=2923706363000;

  CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name VARCHAR (30) NOT NULL,
    description VARCHAR (500) NOT NULL,
    price NUMERIC (10,2),
    instock BOOLEAN not null default true
  );

GRANT ALL PRIVILEGES ON shop.* TO shopadmin;
