# Installation

````
$ cp .env.example .env
$ php artisan key:generate
$ composer install

$ php artisan migrate
$ php artisan db:seed
````

public endpoint /api/items/{id}