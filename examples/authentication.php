<?php
require 'vendor/autoload.php';

$client = new \Apify\ExamplePhpProject\ApifyClient();

print_r($client->getCurrentUser());