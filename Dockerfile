# Use an official Nginx image
FROM nginx:latest

# Install required packages
RUN apt-get update && apt-get install -y \
    php \
    php-fpm \
    php-mysql \
    git \
    mysql-server \
    && apt-get clean

# Copy Nginx configuration
COPY default.conf /etc/nginx/conf.d/default.conf

# Set up PHP and Nginx
RUN mkdir -p /var/www/html/treasure-products

# Copy application code
COPY . /var/www/html/treasure-products

# Set permissions
RUN chown -R www-data:www-data /var/www/html/treasure-products

# Expose the default Nginx port
EXPOSE 80

# Start Nginx and PHP services
CMD ["nginx", "-g", "daemon off;"]