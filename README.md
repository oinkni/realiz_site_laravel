# realiz_site_laravel
Realizare site web folosind Laravel


CREATE USER 'womentechpower'@'localhost' IDENTIFIED BY 'womentechpower';
GRANT ALL PRIVILEGES ON womentechpower.* TO 'womentechpower'@'localhost';

Configurați baza de date în fișierul .env:

composer install

cp .env.example .env

php artisan migrate
php artisan serve


composer require laravel/ui

php artisan ui bootstrap
php artisan ui bootstrap --auth

https://huemint.com/bootstrap-basic/
// THEME generated with https://huemint.com/bootstrap-basic/
npm install && npm run dev
npm run build

 php artisan cache:clear
>> php artisan view:clear
>> php artisan route:cache
>> php artisan config:cache
>> php artisan optimize



