# laravel-challenge
laravel-challenge allows to connect to a public organization via github's API and get all the repositories from the organization

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
Configure your .env file to connect correctly to your database and **add the variables**
```
GIT_USER=yourGitHubUsername
GIT_PASS=yourGitHubPAssword
```
**If you not configure this, you will have access to 60 connections per hour, so please add the variables to have full access to the API** 
Generate an Application Key for your application.
```
php artisan key:generate
```

Migrations

```
php artisan migrate
```


### Usage

Laravel-challenge connect to the default public organization "githubtraining", 
you can change to another organization just changing the protected attribute $orgName on App\Http\Controllers\RepositoryController.php

The route to enter to your repositories list must be:

*YoutServerURL*/repositories

### Test
You can see the code coverage information from the unit test on the CodeCoverage folder

## Authors

* **Ivan cossi camacho** - *Initial work* - [icossi](https://github.com/icossi)



