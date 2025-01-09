# Run this Application with PHP, MySQL in Nginx: 


## Install dependencies


1. Install Nginx, Php, Git and MySql:

```bash
sudo apt update
```

```bash
sudo apt install nginx -y
```

```bash
sudo systemctl start nginx
```

```bash
sudo systemctl enable nginx
```

```bash
sudo systemctl status nginx
```

```bash
sudo apt install php -y
```

```bash
php -v
```

```bash
sudo apt install git
```

```bash
sudo apt install mysql-server -y
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

```bash
sudo apt install php8.3 php8.3-fpm php8.3-mysql -y
```

## Configure MySQl

1. Login to MySQL

```bash
sudo mysql -h localhost -u root
```

2. Create a New User:

```bash
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Mystore123!'; 
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

5. Restart Nginx 

```bash
systemctl restart nginx
```

6. Check logs

```bash
tail -f /var/log/nginx/error.log
```