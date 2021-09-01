<?php
require 'vendor/autoload.php';

// Create services needed further in the example. Your framework will probably allow you to get them via some
// dependency container.
$settings = require_once __DIR__ . '/settings.php';
$client = new \Apify\ApifyPHPTutorial\ApifyClient($settings['token']);
$db = new \Apify\ApifyPHPTutorial\FakeDb($settings['fakeDbFile']);

// Load the data from database and check if the info we are looking for is actually present
$actorRun = $db->load('actorRun');
$datasetId = $actorRun['data']['defaultDatasetId'] ?? null;

if (!$datasetId) {
    throw new Exception('Did not found dataset id in database.');
}

// Use client to get dataset items
$datasetItems = $client->getDatasetItems($datasetId, []);

// Save dataset items to "database"
$db->save('datasetItems', $datasetItems);

// Output dataset items
echo \json_encode($datasetItems, JSON_PRETTY_PRINT);
