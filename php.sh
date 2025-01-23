#!/bin/bash

set -e  # Exit immediately if a command exits with a non-zero status

# Update and install necessary packages
echo "Updating package list and installing required packages..."
sudo apt update -y
sudo apt install -y nginx php php-fpm php-mysql git mysql-server



# Delete previous file configuration
echo "Deleting previous file configuration..."
sudo rm -rf /var/www/html/php_mysql_nginx_docker_treasure-products

# Clone the Git repository
echo "Cloning the repository..."
sudo git clone https://github.com/FerdinandJr/php_mysql_nginx_docker_treasure-products.git /var/www/html/php_mysql_nginx_docker_treasure-products

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

    location ~ \.php\$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;  # Ensure correct PHP version (replace if necessary)
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
EOL'

# Ensure PHP 8.3 is installed (if not already)
echo "Ensuring PHP 8.3 and PHP-FPM are installed..."
sudo apt install -y php8.3 php8.3-fpm php8.3-mysql

# Configure MySQL
echo "Configuring MySQL..."
sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Mystore123!'; FLUSH PRIVILEGES;"
sudo mysql -u root --password=Mystore123! -e "CREATE DATABASE IF NOT EXISTS my_store;"

# Import database
echo "Importing database..."
sudo mysql -u root --password=Mystore123! my_store < /var/www/html/php_mysql_nginx_docker_treasure-products/my_store.sql

#stop Apache server
sudo systemctl stop apache2
sudo systemctl disable apache2
sudo systemctl start nginx

# Restart Nginx to apply the changes
echo "Restarting Nginx..."
sudo systemctl restart nginx

echo "Setup completed successfully!"
