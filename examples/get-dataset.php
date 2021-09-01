<?php
require 'vendor/autoload.php';

// Load your secret settings. Check your framework docs on how to do the same there.
$settings = require_once __DIR__ . '/settings.php';

// Create services needed further in the example. Your framework will probably allow you to get them via some
// dependency container.
$client = new \Apify\ApifyPHPTutorial\ApifyClient($settings['token']);
$db = new \Apify\ApifyPHPTutorial\FakeDb($settings['fakeDbFile']);

// Load the last actor run from database
$actorRun = $db->load('actorRun');

// Check if the data we are looking for are actually present
$datasetId = $actorRun['data']['defaultDatasetId'] ?? null;
if (!$datasetId) {
    throw new Exception('Did not found dataset id in database.');
}

// Use the client to get dataset info
$dataset = $client->getDataset($datasetId);

// Save the info to "database"
$db->save('dataset', $dataset);

// Output dataset details
echo \json_encode($dataset, JSON_PRETTY_PRINT);
