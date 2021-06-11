# Laravel Starter Kit

# Table Of Content
- [Laravel Starter Kit](#laravel-starter-kit)
- [Table Of Content](#table-of-content)
- [About Laravel Starter Kit](#about-laravel-starter-kit)
- [Installation & Organization](#installation--organization)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
    - [Download source from github](#download-source-from-github)
    - [Clone the git repository on your local machine](#clone-the-git-repository-on-your-local-machine)
- [Features](#features)

# About Laravel Starter Kit

This application is designed to be a starting point for future other applications, it brings together several basic functionalities necessary for any application including an authentication system, an administration site which includes many things.


# Installation & Organization

This section describes the installation procedure of the kit.

## Prerequisites

Our kit being based on Laravel 8, to work well it needs:

1.  PHP version 7.3 or higher

    > It is also necessary to ensure that the following extensions of php are active

    - Extension PDO,
    - Extension Mbstring,
    - Extension OpenSSL,
    - Extension Tokenizer,
    - Extension XML,
    - Extension BCMath,
    - Extension Ctype,
    - Extension JSON,
    - Extension Fileinfo

2.  Composer

## Installation

To install and use this kit, you can proceed in two ways:

###  Download source from github

After downloading the sources, unzip the file you got, navigate to the sources folder and do the following:

  - Installs all the dependencies related to note kit:
  
    `composer install`

  - Generate unique key for you kit (app):

    `cp .env.example .env`


    `php artisan key:generate`

  - Migrate your table to a database:

Before proceeding with the migrations, you must first fill in the information relating to your database in the environment file `.env` located at the root of the project:
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database
    DB_USERNAME=user
    DB_PASSWORD=password

Now we can start our migrations:

    php artisan migrate --seed

  - Start the server and enjoy :) :

    > We put our configuration in cache to boost our application

    `php artisan optimize`

    > Maintenant nous sommes prêt à nous lancer

    `php artisan serve`


###  Clone the git repository on your local machine

To clone the repository follow the instructions below:

`git clone https://github.com/StephaneKuma/laravel_starter_kit.git`

You can also rename the kit with a name of your own during the cloning process, if for example we decide to rename it `my_cool_app`: we do as follows:

`git clone https://github.com/StephaneKuma/laravel_starter_kit.git my_cool_app`

Then we navigate in the sources folder then we follow the following instructions:

- Installs all the dependencies related to note kit:
  
    `composer install`

  - Generate unique key for you kit (app):

    `cp .env.example .env`


    `php artisan key:generate`

  - Migrate your table to a database:

Before proceeding with the migrations, you must first fill in the information relating to your database in the environment file `.env` located at the root of the project:
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database
    DB_USERNAME=user
    DB_PASSWORD=password

Now we can start our migrations:

    php artisan migrate --seed

  - Start the server and enjoy :) :

    > We put our configuration in cache to boost our application

    `php artisan optimize`

    > Maintenant nous sommes prêt à nous lancer

    `php artisan serve`


# Features

- [ ] Menu
  - [ ] Dashboard
  - [ ] Pages
- [x] Acces Control
  - [x] Roles
    - [x] Permissions
      - [ ] Create permission
      - [x] Read permission
      - [ ] Update permission
      - [ ] Delete permission
      - [x] List permissions
      - [x] Assign permissions to roles
    - [x] Create role
    - [x] Read role
    - [x] Update role
    - [x] Delete role
    - [x] List roles
    - [ ] Assign role to users
  - [ ] Users
- [ ] System
  - [ ] Menu
  - [ ] Backups
  - [ ] Settings
