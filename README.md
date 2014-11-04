# Car Showroom

***

Angular.js application with a RESTful backend in Slim Framework

## Stack

* Persistence store: [MySQL](http://www.mysql.com/)
* Backend: [Slim Framework](http://slimframework.com/)
* Frontend App: [AngularJS](http://www.angularjs.org/)
* CSS based on [Twitter's bootstrap](http://getbootstrap.com/)

## Installation

### Platform & tools

You need to install a complete set of tools in the development environment, some of theme are:

* PHP (~5.4)
* MySQL
* [Composer](http://getcomposer.org/)
* Some HTTP server
* Node.js
* Grunt
* Bower
* SASS
* Compass

### Get the Code

Either clone this repository or fork it on GitHub and clone your fork:

```
git clone https://github.com/manuelhe/car-showroom.git
cd car-showroom
```

### App Server

#### Data persistance

Create a new database and use the file in `/car-showroom/docs/test_carshowroom.sql` to set the required tables and some example data.

Open the file `/car-showroom/config/config.ini` and change the database connection settings:

```
db_host = "localhost"
db_username = "root"
db_password = "root"
db_database = "test_carshowroom"
db_port = "8889"
db_socket = "/Applications/MAMP/tmp/mysql/mysql.sock"
```
