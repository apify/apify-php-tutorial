<?php
require 'vendor/autoload.php';

// Load your secret settings. Check your framework docs on how to do the same there.
$settings = require_once __DIR__ . '/settings.php';

// Create services needed further in the example. Your framework will probably allow you to get them via some
// dependency container.
$client = new \Apify\ExamplePhpProject\ApifyClient($settings['token']);
$db = new \Apify\ExamplePhpProject\FakeDb($settings['fakeDbFile']);

// Run the specified actor. As a second parameter, you can pass input to it.
$run = $client->runActor("vdrmota~contact-info-scraper", [
    'startUrls' => [
        ['url' => 'https://www.apify.com/contact']
    ],
    // We just want to scrape the single page
    'maxDepth' => 0,
]);

// Save the result to "database"
$db->save('actorRun', $run);

// Output run as json
echo \json_encode($run, JSON_PRETTY_PRINT);
