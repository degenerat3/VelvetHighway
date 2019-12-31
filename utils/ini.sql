CREATE USER shopadmin WITH PASSWORD 'velvet_admin';
CREATE DATABASE shop;

\c shop;

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

ALTER SEQUENCE orders_id_seq RESTART WITH 292370636301000;

  CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name VARCHAR (30) NOT NULL,
    description VARCHAR (250) NOT NULL,
    price NUMERIC (10,2),
    instock BOOLEAN not null default true
  );

GRANT ALL PRIVILEGES ON DATABASE shop TO shopadmin;
GRANT USAGE ON SCHEMA public TO shopadmin;
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO shopadmin;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO shopadmin;