# rexx_coding_challenge
Presentation of shop system and Showing value with filteration

The shop system changed the timezone of the sales date.
Prior to version 1.0.17+60 it was Europe/Berlin.
Afterwards it is UTC. Here I presume the standard timezone is UTC and changed the sale date according to that timezone considering the condition of version comapre.

## Read the json data and save it to the database using php

Check the below mentioned file for this:
database/seeds/ShopsTableDataSeeder.php

![alt text](https://github.com/sourcecde/rexx_challenge/blob/master/Screenshot_2019-12-23_15-58-33.png)

## Prerequisites

- PHP 7.2
- Mysql
- Composer
- yajra datatables 9.8
- Laravel 6.2

## Testing

- phpunit 8.5.0
- vendor\bin\phpunit

## Installation

- Clone git from the Repository (git clone https://github.com/sourcecde/rexx_challenge.git
)
- composer update
- Rename .env.example to .env and provide your database details there.
- Create Database and put Databse name in .env file (DB_DATABASE)
- Database username in 'root' (DB_USERNAME)
- Change DB Password in .env file (If any), otherwise leave blank(DB_PASSWORD)
- php artisan migrate
- php artisan db:seed --class=ShopsTableDataSeeder (This command will Read the json data and save it to the database using php)
- php artisan key:generate
- php artisan serve
- RUN http://127.0.0.1:8000/shops in your browser

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).