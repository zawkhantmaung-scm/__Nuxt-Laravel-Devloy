# __Nuxt-Laravel-Devloy

## Simple-Nuxt-Devloy


````
sudo yum install curl -y 
curl https://raw.githubusercontent.com/creationix/nvm/master/install.sh | bash
source ~/.bashrc
nvm ls-remote
nvm install v14.19.1
nvm run default --version
cd /var/www/html/__Nuxt-Laravel-Devloy/client/
npm install
echo 'BASE_URL=http://your-ip-address:8000' >> .env
npm run build

sudo vim /etc/nginx/nginx.conf

server {
    listen 80;
    listen [::]:80;
    index index.html;
    server_name _;
    root         /var/www/html/__Nuxt-Laravel-Devloy/client/dist;
}

sudo systemctl restart nginx
````
