<?php
require 'vendor/autoload.php';

// Load secret settings. Consult your framework's docs to see how to do the same there
$settings = require_once __DIR__ . '/settings.php';

$client = new \Apify\ExamplePhpProject\ApifyClient($settings['token']);

$run = $client->runActor("vdrmota~contact-info-scraper");

// Output run as json
echo \json_encode($run, JSON_PRETTY_PRINT);