<?php
require 'vendor/autoload.php';

// Load your secret settings. Check your framework docs on how to do the same there.
$settings = require_once __DIR__ . '/settings.php';

// Create services needed further in the example. Your framework will probably allow you to get them via some
// dependency container.
$client = new \Apify\ApifyPHPTutorial\ApifyClient($settings['token']);
$db = new \Apify\ApifyPHPTutorial\FakeDb($settings['fakeDbFile']);

$webhooksEncoded = base64_encode(json_encode([
    [
        'eventTypes' => ['ACTOR.RUN.SUCCEEDED'],
        'requestUrl' => $settings['webhookRequestUrl'],
    ],
]));

$run = $client->runActor("vdrmota~contact-info-scraper", [
    'startUrls' => [
        ['url' => 'https://www.apify.com/contact']
    ],
    // We just want to scrape the single page
    'maxDepth' => 0,
], [
    'timeout' => 30,
    'webhooks' => $webhooksEncoded,
]);

$db->save('actorRunWithOptions', $run);

// Output run as json
echo \json_encode($run, JSON_PRETTY_PRINT);
