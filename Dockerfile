# Use an official PHP image with Nginx
FROM php:8.3-fpm

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    mysql-client \
    && apt-get clean

# Set the working directory
WORKDIR /var/www/html

# Clone the repository
RUN git clone https://github.com/FerdinandJr/php_mysql_nginx_docker_treasure-products.git /var/www/html/php_mysql_nginx_docker_treasure-products

# Copy the Nginx configuration file to the container
COPY nginx/default.conf /etc/nginx/sites-available/default

# Expose ports
EXPOSE 80

# Start both PHP-FPM and Nginx
CMD service nginx start && php-fpm