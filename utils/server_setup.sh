## Get packages
sudo apt update
sudo DEBIAN_FRONTEND=noninteractive apt -y install postgresql postgresql-contrib php7.2 libapache2-mod-php php7.2-pgsql apache2
sudo systemctl restart apache2

## Setup DB
sudo useradd shopadmin
sudo -u postgres psql -a -f ini.sql # create tables
sudo -u postgres psql -a -f add_products.sql # insert items into products table

## Allow db remote connections
#TODO

## Copy app files to web dir
cp -r ../site/* /var/www/html
rm /var/www/html/index.html
