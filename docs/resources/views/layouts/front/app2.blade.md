Here is the reformatted documentation in Markdown format:


# Laravel Application Documentation


## Introduction


This documentation outlines the setup and dependencies for a Laravel application. It includes instructions on how to install the project, as well as information about the various packages and libraries used.


## Installing Dependencies


To install the dependencies, run the following command:

```bash
composer install
```

### Laravel Dependencies

The following are the Laravel dependencies used throughout the project:


* `php` ^8.0.2
* `arielmejiadev/larapex-charts` ^5.2
* `barryvdh/laravel-dompdf` ^2.0
* `guzzlehttp/guzzle` ^7.2
* `laravel/framework` ^9.2
* `laravel/sanctum` ^2.14.1
* `laravel/socialite` ^5.5
* `laravel/tinker` ^2.7
* `laravel/ui` ^3.4
* `livewire/livewire` ^2.12
* `maatwebsite/excel` ^3.1
* `razorpay/razorpay` ^2.9


### Laravel Dev Dependencies

The following are the Laravel development dependencies:


* `fakerphp/faker` ^1.9.1
* `laravel/sail` ^1.0.1
* `mockery/mockery` ^1.4.4
* `nunomaduro/collision` ^6.1
* `phpunit/phpunit` ^9.5.10
* `spatie/laravel-ignition` ^1.0


### Node Dev Dependencies

The following are the Node development dependencies:


* `@popperjs/core` ^2.10.2
* `axios` ^0.25
* `bootstrap` ^5.1.3
* `laravel-mix` ^6.0.6
* `lodash` ^4.17.19
* `postcss` ^8.1.14
* `resolve-url-loader` ^5.0.0
* `sass` ^1.32.11
* `sass-loader` ^11.0.1


## Setting Up the Application

To set up the application, follow these steps:


### 1. Install Dependencies

Run the following command to install dependencies:

```bash
composer install
```

### 2. Set Up Database

Set up your database by running the following commands:


* `php artisan migrate`
* `php artisan db:seed`


### 3. Run the Application

To run the application, simply type the following command in the terminal:


```bash
php artisan serve
```


## Using Laravel Mix

Laravel Mix is a powerful tool for building custom asset bundles.


### 1. Install Laravel Mix

Install Laravel Mix by running the following command:


```bash
npm install laravel-mix --save-dev
```

### 2. Create a Mix Configuration File

Create a mix configuration file in the `app/mix` directory. This is where you can customize your application's asset bundles.


### 3. Run Laravel Mix

To run Laravel Mix, simply type the following command in the terminal:


```bash
npm run dev
```

This will create custom asset bundles for your application.


## Using Sass and PostCSS


Sass and PostCSS are powerful tools for building custom CSS stylesheets.


### 1. Install Sass and PostCSS

Install Sass and PostCSS by running the following commands:


* `npm install sass --save-dev`
* `npm install postcss --save-dev`


### 2. Create a Sass File

Create a Sass file in the `app/sass` directory. This is where you can write your custom CSS stylesheets.


### 3. Run Sass and PostCSS

To run Sass and PostCSS, simply type the following command in the terminal:


```bash
npm run sass
```

This will compile your Sass files into CSS stylesheets for your application.

## Conclusion


This documentation outlines the setup and dependencies for a Laravel application. It includes instructions on how to install the project, as well as information about the various packages and libraries used.