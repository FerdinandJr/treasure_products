# Dockerfile for PHP, Nginx and MySQL setup

# Use the official PHP image with Nginx
FROM php:8.3-fpm

# Install required packages
RUN apt-get update -y && \
    apt-get install -y nginx git mysql-client libmysqlclient-dev && \
    rm -rf /var/lib/apt/lists/*

# Clone the repository
RUN git clone https://github.com/FerdinandJr/php_mysql_nginx_docker_treasure-products.git /var/www/html/php_mysql_nginx_docker_treasure-products

# Set the working directory
WORKDIR /var/www/html/php_mysql_nginx_docker_treasure-products

# Nginx configuration file
COPY nginx/default.conf /etc/nginx/sites-available/default

# PHP and Nginx setup
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

# Ensure correct permissions for the web folder
RUN chown -R www-data:www-data /var/www/html/php_mysql_nginx_docker_treasure-products

# Expose the required port
EXPOSE 80

# Start the services
CMD service nginx start && php-fpm