<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Installation

Please create a new database then do the following:

create .env file

copy contents of .env.example to .env

put your database name into the following :

DB_DATABASE=[YOUR DATABASE NAME]


run :
```
php artisan migrate
php artisan key:generate
```
try running php artisan route:list. if errors indicating oauth keys not existing then passport is not installed yet.
if passport is not installed then :
```
php artisan passport:install
```
