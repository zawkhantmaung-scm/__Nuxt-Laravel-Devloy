# __Nuxt-Laravel-Devloy

## Simple Laravel Devloy Nginx


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

sudo yum -y update
sudo amazon-linux-extras install epel -y
sudo amazon-linux-extras install nginx1 -y 
sudo systemctl enable nginx
sudo systemctl start nginx

cd /var/www/html
sudo git clone https://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@github.com/zawkhantmaung-scm/__Nuxt-Laravel-Devloy.git
cd /var/www/html/__Nuxt-Laravel-Devloy/server
sudo chmod 777 -R /var/www/html
composer install

cp .env.example .env
php artisan key:generate

sudo vim /etc/nginx/nginx.conf

server {
    listen 8000;
    listen [::]:8000;
    server_name _;
    root /var/www/html/__Nuxt-Laravel-Devloy/server/public;
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";
    index index.php;
    charset utf-8;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt { access_log off; log_not_found off; }
    error_page 404 /index.php;
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php-fpm/www.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
    location ~ /\.(?!well-known).* {
        deny all;
    }
}

sudo systemctl restart nginx

sudo chmod -R 777 storage
````
