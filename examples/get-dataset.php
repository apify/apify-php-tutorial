<?php
require 'vendor/autoload.php';

// Load secret settings. Consult your framework's docs to see how to do the same there
$settings = require_once __DIR__ . '/settings.php';

$client = new \Apify\ExamplePhpProject\ApifyClient($settings['token']);
$db = new \Apify\ExamplePhpProject\FakeDb($settings['fakeDbFile']);

$actorRun = $db->load('actorRun');
$datasetId = $actorRun['data']['defaultDatasetId'] ?? null;

if (!$datasetId) {
    throw new Exception('Did not found dataset id in database.');
}

$dataset = $client->getDataset($datasetId);
$db->save('dataset', $dataset);

echo \json_encode($dataset, JSON_PRETTY_PRINT);
