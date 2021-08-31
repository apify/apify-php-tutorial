<?php
require 'vendor/autoload.php';

// Load secret settings. Consult your framework's docs to see how to do the same there
$settings = require_once __DIR__ . '/settings.php';

$client = new \Apify\ExamplePhpProject\ApifyClient($settings['token']);
$db = new \Apify\ExamplePhpProject\FakeDb($settings['fakeDbFile']);

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
