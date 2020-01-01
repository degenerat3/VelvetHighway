#!/bin/bash
## Get packages
echo "[+] Updating packages..."
sudo apt-get update > /dev/null
echo "[+] Installing packages..."
sudo DEBIAN_FRONTEND=noninteractive apt-get -y install postgresql postgresql-contrib php7.2 libapache2-mod-php php7.2-pgsql apache2 > /dev/null
sudo systemctl restart apache2 > /dev/null

## Setup DB
echo "[+] Adding user..."
sudo useradd shopadmin > /dev/null
echo "[+] Initializng database..."
sudo -u postgres psql -a -f ini.sql  > /dev/null # create tables
echo "[+] Adding product to database..."
sudo -u postgres psql -a -f add_products.sql > /dev/null # insert items into products table

## Allow db remote connections
#TODO

## Copy app files to web dir
echo "[+] Setting up web pages..."
cp -r ../site/* /var/www/html > /dev/null
rm /var/www/html/index.html > /dev/null
