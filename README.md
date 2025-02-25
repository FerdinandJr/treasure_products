# Treasure Products full-stack e-commerce web application built with PHP and MySQL


## Install dependencies

## Table of Contents

## Installation
1. Install Dependencies Nginx, Php, Git and MySql:

```bash
sudo apt update
sudo apt install nginx -y
sudo systemctl start nginx
sudo systemctl enable nginx
sudo systemctl status nginx
sudo apt install php -y
php -v
sudo apt install git
sudo apt install mysql-server -y
sudo apt install php8.3 php8.3-fpm php8.3-mysql -y
```


## Configure Nginx

1. Clone the repository

```bash
cd /home/ubuntu/
```

2. Move the file
```bash
mv treasure-products /var/www/html/
```

```bash
git clone 
```

2. 

```bash
sudo nano /etc/nginx/sites-available/default
```

```bash
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/html/treasure-products;
    index index.php index.html index.htm;

    server_name _;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;  # Ensure correct PHP version (replace 7.4 if necessary)
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```


## Configure MySQl

1. Login to MySQL

```bash
sudo mysql -h localhost -u root
```

2. Create a New User:

```bash
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root@000!'; 
FLUSH PRIVILEGES;
exit;
```

3. Enter database wusing localhost user and password:

```bash
mysql -h localhost -u root -p
```

```bash
show databases;
```

```bash
create database my_store;
```

```bash
show databases;
```

```bash
exit;
```

4. Copy the my_store database file to MySql

```bash
mysql -h localhost -u root -p my_store < my_store.sql
```

5. Verify the database table (Optional)

```bash
mysql -h localhost -u root -p
```

```bash
show databases;
```

```bash
use my_store;
```

```bash
show tables;
```

Optional: show data

```bash
SELECT * FROM table_name LIMIT 10;
```

5. Restart Nginx 

```bash
systemctl restart nginx
```

6. Check logs

```bash
tail -f /var/log/nginx/error.log
```
