# Docker lamp
A highly customizable PHP, MySQL, Apache, Mongo development environment based on docker.
Containers include
- PHP7.3
- MySQL Latent
- Mongodb
- Adminer
- PHPMyAdmin
- Mongo express

Comes with following features
- Ability to add your own vhost
- Supports xdebug  
- Composer ready
- Symfony ready

## How to use
```Bash
git clone git@github.com:xelber/docker-lamp.git docker-lamp
cd docker-lamp
cd Docker
docker-compose up -d
```
visit http://localhost/ for default home page, this will link in to Adminer, PHPMyAdmin and Mongo Express

## Add you own vhost
An example can be found at Docker/sites-enabled/default.conf, copy and change as neede.

### Laravel
Create your laravel installation at site/laravel
There are multiple ways you can do this, but since this is composer ready, you can ssh on to the PHP instance and do the following
```Bash
cd Docker
docker exec -it php /bin/bash
cd /var/www/html/sites
composer create-project --prefer-dist laravel/laravel laravel
exit
```
Above I am assuming your Laravel project folder is named 'laravel'
Create a vhost conf, for example for a Laravel installation, it would look like following
```
<VirtualHost *:80>
    ServerName laravel.docker
    ProxyPassMatch ^/(.*\.php(/.*)?)$ fcgi://php:9000/var/www/html/sites/laravel/public/$1
    DocumentRoot /var/www/html/sites/laravel/public/
    <Directory /var/www/html/sites/laravel/public/>
        DirectoryIndex index.html index.php
        Options Indexes MultiViews
        AllowOverride none
        Require all granted
    </Directory>

    CustomLog /var/log/docker/apache-site-laravel-access.log common
    ErrorLog /var/log/docker/apache-site-laravel-error.log
</VirtualHost>
```
Restart instances with following (Make sure you are in Docker folder)
```Bash
docker-compose.exe up -d --build
```
