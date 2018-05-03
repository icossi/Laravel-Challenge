# laravel-challenge
laravel-challenge

## Getting Started
You can clone the laravel-challenge source directory with:
```
git clone https://github.com/icossi/laravel-challenge.git
```

### Prerequisites

* Php > 7.1
* Composer
* Laravel
* MySQL 

### Installing

After clone the repository
Go to the repository's path on your terminal and run
```
composer install
```
Configure yout .env file to connect correctly to your database

Migrations

```
php artisan migrate
```

### Usage

The application connect to the default public organization "githubtraining", 
you can change to another organization just changing the protected attribute $orgName on App\Http\Controllers\RepositoryController.php

## Authors

* **Ivan cossi camacho** - *Initial work* - [PurpleBooth](https://github.com/icossi)



