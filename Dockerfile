FROM php:apache
# Install required dependencies, including Git and any PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    && docker-php-ext-install mysqli \
    && rm -rf /var/lib/apt/lists/*


RUN git clone https://github.com/FerdinandJr/php_mysql_nginx_docker_treasure-products.git /var/www/php_mysql_nginx_docker_treasure-products

RUN rm /etc/apache2/sites-available/000-default.conf

RUN cp -r /var/www/php_mysql_nginx_docker_treasure-products/000-default.conf /etc/apache2/sites-available/000-default.conf

CMD ["docker-compose", "up"]
