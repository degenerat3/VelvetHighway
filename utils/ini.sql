CREATE USER shopadmin WITH PASSWORD 'velvet_admin';
CREATE DATABASE shop;
GRANT ALL PRIVILEGES ON DATABASE "shop" TO shopadmin;
GRANT ALL PRIVILEGES ON * TO 'remoteadmin'@'%' IDENTIFIED BY 'remote_admin' WITH GRANT OPTION;
FLUSH PRIVILEGES;

  use shop;

  CREATE TABLE orders (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    prodid INT(4),
    ccnum INT(16),
    cvv INT(3),
    shipped BOOLEAN not null default 0
  );

  CREATE TABLE products (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(250) NOT NULL,
    price decimal (10,2),
    instock BOOLEAN not null default 1
  );