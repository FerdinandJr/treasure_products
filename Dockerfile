# Step 1: Set up the PHP environment with Nginx
FROM php:8.1-fpm-alpine as php

# Install required packages for PHP extensions and Nginx
RUN apk update && apk add --no-cache \
    nginx \
    bash \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Step 2: Copy PHP configuration files
COPY ./php.ini /usr/local/etc/php/

# Step 3: Set up the Nginx configuration
COPY ./nginx.conf /etc/nginx/nginx.conf

# Step 4: Copy the application source code to the container
WORKDIR /var/www/html
COPY . .

# Step 5: Expose ports
EXPOSE 80

# Step 6: Start PHP-FPM and Nginx services in the background
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
