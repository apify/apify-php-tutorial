<?php
require 'vendor/autoload.php';

// Create services needed further in the example. Your framework will probably allow you to get them via some
// dependency container.
$settings = require_once __DIR__ . '/settings.php';
$client = new \Apify\ApifyPHPTutorial\ApifyClient($settings['token']);

$user = $client->getCurrentUser();

// Output user as json
echo \json_encode($user, JSON_PRETTY_PRINT);
