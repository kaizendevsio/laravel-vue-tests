# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Steps to run the tests:
- Make sure you have PHP >= 7.3
- Create a database with the following info:
   DB_DATABASE=homestead
   DB_USERNAME=homestead
   DB_PASSWORD=9mvtEA4jfzAArYc
   
- Clone the repo, then run the following command: 
    php artisan migrate
    
- Run the application: 
    php -S localhost:8000 -t public


## Note
 - I intentionally left out things like Vue routing, CSRF token protection, and other advanced front-end and back-end technologies, with the purpose of showing the proof of concept only and not over complicating things.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
