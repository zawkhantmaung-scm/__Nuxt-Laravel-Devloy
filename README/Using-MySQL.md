# __Nuxt-Laravel-Devloy

## Using MySQL


````
sudo wget https://dev.mysql.com/get/mysql80-community-release-el7-5.noarch.rpm
sudo md5sum mysql80-community-release-el7-5.noarch.rpm
sudo rpm -ivh mysql80-community-release-el7-5.noarch.rpm
sudo rpm --import https://repo.mysql.com/RPM-GPG-KEY-mysql-2022
sudo yum install mysql-server -y -y
sudo systemctl start mysqld
sudo systemctl status mysqld
sudo grep 'temporary password' /var/log/mysqld.log
sudo mysql_secure_installation
mysql -u root -p
CREATE DATABASE nuxt_laravel_devloy;
use nuxt_laravel_devloy;

sudo vim .env

DB_DATABASE=nuxt_laravel_devloy
DB_USERNAME=root
DB_PASSWORD=Welcome@123

php artisan migrate --seed
````
