# A full-stack monolithic e-commerce application built with PHP and MySQL. 
 
It includes essential features such as user authentication, session management, product catalog, shopping cart, checkout, and an admin panel for managing products.

Treasure Products is designed for selling gadgets and a variety of other items, it provides a seamless shopping experience.

![treasure-products-diagram](https://github.com/FerdinandJr/treasure_products/blob/4beb2875c040d477022011fd64c018806313bf68/treasure-products-diagram.svg)

https://github.com/user-attachments/assets/44078d47-0c19-46ea-96c9-49161b6f3b01

## Table of Contents
- [Installation](#installation)
- [Video](#video)


## Installation
1. Install Dependencies Nginx, Php, Git and MySql:

```bash
sudo apt update
sudo apt install nginx -y
sudo apt install php -y
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


## Configure MySQL

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

3. Enter database using localhost user and password:

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
test

## Video

### How to deploy php and mysql in AWS ec2: https://youtu.be/RZmgXHM1gt8?si=CBSIhRgeKGFuYrQ_

### How to deploy php and mysql application using bash scripting: https://youtu.be/w95Pqf9P8ic?si=Q-E-N_oPz7zzmtCm

### How to deploy php and mysql application using docker containers: https://youtu.be/SGHL_bScJq8?si=ACz1aMCTAAU6SYDF
