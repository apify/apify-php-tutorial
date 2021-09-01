# Apify PHP Tutorial

Collection of examples on how to use [Apify](https://www.apify.com) API with PHP using [guzzlehttp/guzzle](https://github.com/guzzle/guzzle) library, serving as supporting material for [Apify PHP tutorial](TODO:LINK).

## Setting up

Run `composer install` to get needed dependencies.

Copy the `/examples/settings.php.template` file as `/examples/settings.php` and fill in your Apify API token and optionally also a [request bin endpoint](https://requestbin.com/r).

## Running the examples

Now that everything is set up, you can run individual examples in the `/examples` folder, they should be more or less framework-agnostic.

Adding the client as service depends on the actual framework you use, following links might help you find out how to do it in yours.

 - Laravel: https://laravel.com/docs/8.x/container
 - CodeIgniter: https://codeigniter4.github.io/userguide/concepts/services.html
 - Symphony: https://symfony.com/doc/current/service_container.html
 - Nette: https://doc.nette.org/en/3.0/di-services