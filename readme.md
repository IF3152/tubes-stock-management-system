# Release Note - Stock Distribution Manager
## Stok Management System
Version 1.0

## Feature Covered

1. Stok
2. Cabang
3. User
4. Order
5. Notifikasi
6. Laporan
7. Otentifikasi

## Tech Used

- Laravel 5.5
- MySQL
- Apache2
- Pusher for Real Time Notification
- Google Mail API for Emailing

## Instalation Guide

### Prerequisite

Machine with Composer, Apache2, PHP 7.1, and MySQL installed

### Steps

Lakukan langkah-langkah berikut melalui cmd
Clone the git 
````
git clone https://github.com/IF3152/tubes-stock-management-system.git
````
Move to directory **tubes-stock-management-system**
````
 cd tubes-stock-management-system
````
 Create the .env file by duplicating the .env.example
````
 copy .env.example .env
````
Install package using Composer
````
composer install
````
Generate APP_KEY with command bellow
````
php artisan key:generate
````
Created a database localy on MySQL
````sql
CREATE DATABASE "NAMA_DATABASE KALIAN "
````


Edit  DB part on the .env file, as follow
````
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="NAMA_DATABASE KALIAN "
DB_USERNAME="USERNAME_MYSQL_KALIAN"
DB_PASSWORD="PASSWORD_MYSQL_KALIAN"
```` 

Do migrate and seed
````
php artisan migrate:refresh --seed
````
Serve localy on your machine
````
php artisan serve
````
### Steps (Special for Assistance)
Download the attached source code on link below
````
#on google drive
````

Created a database localy on MySQL
````sql
CREATE DATABASE "NAMA_DATABASE KALIAN "
````
Edit  DB part on the .env file, as follow
````
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="NAMA_DATABASE KALIAN "
DB_USERNAME="USERNAME_MYSQL_KALIAN"
DB_PASSWORD="PASSWORD_MYSQL_KALIAN"
```` 
Do migrate and seed
````
php artisan migrate:refresh --seed
````
Serve localy on your machine
````
php artisan serve
````
### Deployment
This project has been deployed on VPS for several days  in
[http://139.59.243.123](http://139.59.243.123) 

## About Us
We're Group 6 consist of 6 human 
 1. Condro
 2. Bimasakti
 3. Irfan
 4. Tessa
 5. WIlliam
 6. Shafwan

doing RPL course

## Thanks!!!

