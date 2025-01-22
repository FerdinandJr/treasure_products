#!/bin/bash

# Update and install necessary packages
echo "Updating package list and installing required packages..."
sudo apt update -y
sudo apt install nginx -y
sudo apt install php -y
sudo apt install git -y
sudo apt install mysql-server -y

# Clone the Git repository
echo "Cloning the repository..."
cd /home/ubuntu/
git clone https://github.com/FerdinandJr/php_mysql_nginx_docker_treasure-products.git

mv /home/ubuntu/php_mysql_nginx_docker_treasure-products /var/www/html/

# Edit Nginx default configuration
echo "Configuring Nginx..."
sudo bash -c 'cat > /etc/nginx/sites-available/default <<EOL
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/html/php_mysql_nginx_docker_treasure-products;
    index index.php index.html index.htm;

    server_name _;

    location / {
        try_files \$uri \$uri/ =404;
    }

    location ~ \\.php\$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;  # Ensure correct PHP version (replace 7.4 if necessary)
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ \\/\\.ht {
        deny all;
    }
}
EOL'

# Install PHP 8.3 and related packages
echo "Installing PHP 8.3 and PHP-FPM..."
sudo apt install php8.3 php8.3-fpm php8.3-mysql -y

# Configure MySQL
echo "Configuring MySQL..."
sudo mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Mystore123!'; FLUSH PRIVILEGES;"

mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS my_store;"

# Import database
echo "Importing database..."
mysql -u root -p my_store < /home/ubuntu/php_mysql_nginx_docker_treasure-products/my_store.sql

# Restart Nginx to apply the changes
echo "Restarting Nginx..."
sudo systemctl restart nginx