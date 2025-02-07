# Use an official PHP image with Nginx
FROM php:apache

# Install necessary dependencies
RUN docker-php-ext-install mysqli

# Set the working directory
WORKDIR /var/www/html

RUN mkdir -p /path/to/directory

# Clone the repository
COPY /.  /var/www/php_mysql_nginx_docker_treasure-products

# Copy the Nginx configuration file to the container
