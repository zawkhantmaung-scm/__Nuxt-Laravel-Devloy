# __Nuxt-Laravel-Devloy

## Jenkins-Nuxt-Laravel-Devloy-CICD

- Setup `JAVA_HOME` and `Git` path
- Install `nvm-wrapper` plugin
- Add `github-webhook`

- Setup `Commands`
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

sudo yum install java-1.8.0-openjdk-devel -y
vim ~/.bash_profile

JAVA_HOME=/usr/lib/jvm/java-1.8.0-openjdk-1.8.0.312.b07-1.amzn2.0.2.x86_64
PATH=$PATH:$HOME/.local/bin:$HOME/bin:$JAVA_HOME:

sudo wget -O /etc/yum.repos.d/jenkins.repo     https://pkg.jenkins.io/redhat-stable/jenkins.repo
sudo rpm --import https://pkg.jenkins.io/redhat-stable/jenkins.io.key
sudo yum upgrade -y -y
sudo amazon-linux-extras install epel -y
sudo yum install jenkins -y
sudo systemctl daemon-reload
sudo systemctl start jenkins
sudo systemctl status jenkins
sudo cat /var/lib/jenkins/secrets/initialAdminPassword

echo $JAVA_HOME
which git

sudo vim /etc/nginx/nginx.conf

server {
    listen 8000;
    listen [::]:8000;
    server_name _;
    root /var/lib/jenkins/workspace/test01/server/public;
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

sudo yum install curl -y 
curl https://raw.githubusercontent.com/creationix/nvm/master/install.sh | bash
source ~/.bashrc
nvm ls-remote
nvm install v14.19.1
nvm run default --version

sudo vim /etc/nginx/nginx.conf

server {
    listen 80;
    listen [::]:80;
    index index.html;
    server_name _;
    root         /var/lib/jenkins/workspace/test01/client/dist;
}

sudo systemctl restart nginx
````

- write in Jenkins workspace `execute shell`
````
cd /var/lib/jenkins/workspace/test01/server
composer install
cp .env.example .env
php artisan key:generate
cd /var/lib/jenkins/workspace/test01
sh permission.sh

cd /var/lib/jenkins/workspace/test01/client
echo 'BASE_URL=http://184.72.203.40:8000' >> .env
npm install
npm run build
````

- Note:: In version-2, I will have to delete `permission.sh` file and try to get only with `Jenkins`.