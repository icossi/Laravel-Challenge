# laravel-challenge
laravel-challenge allows to connect to a public organization via github's api and get all the repositories from the organization

## Getting Started
You can clone the laravel-challenge source directory with:
```
git clone https://github.com/icossi/laravel-challenge.git
```

### Prerequisites

* PHP > 7.1
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

Laravel-challenge connect to the default public organization "githubtraining", 
you can change to another organization just changing the protected attribute $orgName on App\Http\Controllers\RepositoryController.php

The route to enter to your repositories list must be:

*YoutServerURL*/repositories


## Authors

* **Ivan cossi camacho** - *Initial work* - [icossi](https://github.com/icossi)



