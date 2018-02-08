# NewsFeed

NewsFeed is a PHP course project built using MVC architectural pattern and MySQL for database management.

### Built using

* PHP 7.1.3
* Apache 2
* MySQL

### Installing

You need to modify the following lines in config/config.php for MySQL connection with your own logs

```
$dsn="mysql:host=server;dbname=yourDbName";
$login="yourUsername";
$password="yourPassword";
```

Then you need to import .sql file located in the project root. 

## Features and patterns included

* XML Parser engine
* Factory pattern
* Autoloader PSR-1
* MVC pattern

## Authors

* **Gabin Salabert** - [Github Page](https://github.com/GabinSalabert)
* **Adrien Lenoir** - [Github Page](https://github.com/IraSkyx)

## Acknowledgments

* [PHPDOC](http://php.net/docs.php)
* Sébastien Salva (Lecturer in IUT Clermont, UCA)
