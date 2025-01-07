# realiz_site_laravel
Realizare site web folosind Laravel


# Pornire aplicatie pe local 

> [!IMPORTANT]  
> Aplicatia este scrisa cu Laravel 11 si cu Bootstrap 5 

## Prerequisites:
- trebuie sa aveti un server de MySql instalat. (xampp e bun)
- trebuie sa aveti instalat PHP 
- trebuie sa aveti instalat [Composer](https://getcomposer.org/download/) 
- trebuie sa aveti instalat [Node](https://nodejs.org/en/download) 


## Pregatire baze de date

Se ruleaza urmatoarele comenzi pentru a crea baza de date si utilizatorul de baze de date pentru schema respectiva: 
```
CREATE DATABASE womentechpower2;
CREATE USER 'womentechpower2'@'localhost' IDENTIFIED BY 'womentechpower2';
GRANT ALL PRIVILEGES ON womentechpower2.* TO 'womentechpower2'@'localhost';
```


## Build si configurare

Din linia de comanda in fisierul proiectului faceti: 

```
cp .env.example .env
```
Daca aveti alta baza de date sau alte date de configurare la baza de date trebuie sa editati proprietatile de conectare din fisierul .env. 
Daca ati rulat sql de mai sus cu womentechpower2 si va conectati la mysql: nu este nevoie sa editati nimic.


Trebuie facuta instalarea de utilitare de Php via composer:
```
composer install
```

Trebuie facut build la resursele de UI pentru Bootstrap:
```
npm install
npm run build
```

Trebuie facut simlynk pentru stocarea avatarelor de membri: 

```
php artisan storage:link
```


Trebuie rulate migrarile bazei de date:
```
php artisan migrate
```

## Pornire server
Din linie de comanda in folderul cu aplicatia:
```
php artisan serve
```

# Pentru posteritate

-- Periodic rulez in linia de comanda:
```
 php artisan cache:clear
php artisan view:clear
 php artisan route:cache
php artisan config:cache
php artisan optimize
```

-- Login si bootstrap au fost adaugate prin: 

```
composer require laravel/ui
php artisan ui bootstrap --auth
```

-- Tema si culorile au fost generate cu: [Huemint](https://huemint.com/bootstrap-basic/)
