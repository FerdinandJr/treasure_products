# Use an official Ubuntu as a parent image
FROM ubuntu:22.04

# Set environment variables
ENV DEBIAN_FRONTEND=noninteractive

# Install necessary dependencies and update the package list
RUN apt update -y && \
    apt install -y \
    software-properties-common \
    ca-certificates \
    curl \
    lsb-release \
    sudo && \
    apt clean

# Add the PHP repository (PHP 8.3)
RUN add-apt-repository ppa:ondrej/php && \
    apt update -y

# Install the required packages
RUN apt install -y \
    nginx \
    php8.3 \
    php8.3-fpm \
    php8.3-mysql \
    git \
    mysql-server && \
    apt clean

# Clone the repository and set up the application
RUN git clone https://github.com/FerdinandJr/php_mysql_nginx_docker_treasure-products.git /var/www/html/php_mysql_nginx_docker_treasure-products

# Configure Nginx and PHP-FPM
RUN bash -c 'echo "server {\
    listen 80 default_server;\
    listen [::]:80 default_server;\
    root /var/www/html/php_mysql_nginx_docker_treasure-products;\
    index index.php index.html index.htm;\
    server_name _;\
    location / {\
        try_files \$uri \$uri/ =404;\
    }\
    location ~ \.php\$ {\
        include snippets/fastcgi-php.conf;\
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;\
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;\
        include fastcgi_params;\
    }\
    location ~ /\.ht {\
        deny all;\
    }\
}" > /etc/nginx/sites-available/default'

# Expose ports
EXPOSE 80 443

# Start Nginx and MySQL services, then execute custom startup scripts
CMD service mysql start && \
    mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Mystore123!'; FLUSH PRIVILEGES;" || true && \
    mysql -u root --password=Mystore123! -e "CREATE DATABASE IF NOT EXISTS my_store;" && \
    mysql -u root --password=Mystore123! my_store < /var/www/html/php_mysql_nginx_docker_treasure-products/my_store.sql && \
    service nginx start && tail -f /dev/null
