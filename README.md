# Apify PHP Tutorial

Collection of examples on how to use [Apify](https://www.apify.com) API with PHP using [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) library, serving as supporting material for [Apify PHP tutorial](TODO:LINK).

## Setting up

Run `composer install` to get needed dependencies.

Copy the `/examples/settings.php.template` file as `/examples/settings.php` and fill in your credentials.

## Running the examples

Now that everything is set up, you can run individual examples in the `/examples` folder.

Examples should be more or less framework-agnostic.

Adding the client as service depends on the actual framework you use, following are the 

 - Laravel: https://laravel.com/docs/8.x/container
 - CodeIgniter: https://codeigniter4.github.io/userguide/concepts/services.html
 - Symphony: https://symfony.com/doc/current/service_container.html