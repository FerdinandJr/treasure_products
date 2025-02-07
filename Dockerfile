# Use an official PHP image with Nginx
FROM php:apache

# Install necessary dependencies
RUN docker-php-ext-install mysqli

# Set the working directory
WORKDIR /var/www/html

# Clone the repository
RUN git clone https://github.com/FerdinandJr/php_mysql_nginx_docker_treasure-products.git /var/www/html/php_mysql_nginx_docker_treasure-products

# Copy the Nginx configuration file to the container