# __Nuxt-Laravel-Devloy

## Using MySQL


- write in Jenkins workspace `execute shell`
````
cd /var/lib/jenkins/workspace/test01/server
composer install
cp .env.example .env

echo 'DB_HOST=database-1.crhmxhcx5hci.us-east-1.rds.amazonaws.com' >> .env
echo 'DB_USERNAME=user' >> .env
echo 'DB_PASSWORD=password' >> .env
echo 'DB_DATABASE=mydb' >> .env

php artisan key:generate
php artisan migrate --seed
cd /var/lib/jenkins/workspace/test01
sh permission.sh

cd /var/lib/jenkins/workspace/test01/client
rm -rf .env
echo 'BASE_URL=http://44.203.156.48:8000' >> .env
npm install
npm run build

````