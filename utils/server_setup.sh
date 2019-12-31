## Get packages
sudo apt update
sudo DEBIAN_FRONTEND=noninteractive apt -y install apache2 php libapache2-mod-php postgresql postgresql-contrib
sudo systemctl restart apache2

## Setup DB
sudo -u postgres psql -a -f ini.sql # create tables
sudo -u postgres psql -a -f add_products.sql # insert items into products table

## Allow db remote connections
#TODO

## Copy app files to web dir
cp -r ../site/* /var/www/html
rm /var/www/html/index.html
