# __Nuxt-Laravel-Devloy

## Simple Laravel Devloy Apache


````
sudo yum update -y
sudo amazon-linux-extras enable php7.4 -y
sudo yum clean metadata
sudo yum install  -y php php-{pear,cgi,common,curl,mbstring,gd,mysqlnd,gettext,bcmath,json,xml,fpm,intl,zip,imap}
sudo yum install  -y git
curl -sS https://getcomposer.org/installer | php
sudo  mv composer.phar /usr/bin/composer
chmod +x /usr/bin/composer

php --version

sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www && find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;

cd /var/www/html
git clone https://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@github.com/zawkhantmaung-scm/__Nuxt-Laravel-Devloy.git
cd /var/www/html/__Nuxt-Laravel-Devloy/server
composer install

cp .env.example .env
php artisan key:generate

sudo vim /etc/httpd/conf/httpd.conf

<VirtualHost *:80>
	ServerName laravel.example.com
	DocumentRoot /var/www/html/__Nuxt-Laravel-Devloy/server/public
	<Directory /var/www/html/__Nuxt-Laravel-Devloy/server>
		AllowOverride All
	</Directory>
</VirtualHost>

sudo systemctl start httpd
sudo systemctl start php-fpm
sudo systemctl enable php-fpm

chmod -R 777 storage
````
