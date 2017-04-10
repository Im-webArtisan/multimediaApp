An Illustration of Multimedia Databases
=====

Simple Online Video Storage App


## Features 
* Upload Videos
* Watch Videos
* Search for videos

## Roles
###  User
Has access to all the features

# Quick Guide

1. Clone this folder to your documents root e.g under `c:\xampp\htdocs\multimedia` on windows
2. Import the `db.sql` file to your database. (You can create a database called multimedia using phpmyadmin and import this file into it)
3. open `includes\conn.inc.php` file and enter your database settings
```php
define('db_host', 'localhost');
define('db_user', 'root');
define('db_password', '');
define('db_database', 'multimedia');
```
4. Open the url to your project e.g [http://localhost/multimedia](http://localhost/multimedia)



 


