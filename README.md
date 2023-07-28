composer install
php artisan key:generate

DB_DATABASE=usermanagement
DB_USERNAME=root
DB_PASSWORD=

php artisan   migrate:fresh --seed

Email:admin@admin.com
password:123

@created By Abdelrahman Moharan
