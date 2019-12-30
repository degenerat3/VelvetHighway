sudo apt update
sudo DEBIAN_FRONTEND=noninteractive apt -y install apache2 php libapache2-mod-php mysql-server
sudo systemctl restart apache2