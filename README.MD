# Installation

````
$ cp .env.example .env
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
````

public endpoint /api/items/{id}