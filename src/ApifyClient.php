<?php

namespace Apify\ExamplePhpProject;

use GuzzleHttp\Client;

class ApifyClient
{
    private $client;

    public function __construct(string $token)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.apify.com',
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
    }

    public function getCurrentUser(): array
    {
        $response = $this->client->get('/v2/users/me');
        return \json_decode($response->getBody(), true);
    }

    public function runActor(string $actorId, array $input): array
    {
        $response = $this->client->post(sprintf('/v2/acts/%s/runs', $actorId), [
            'json' => $input
        ]);
        return \json_decode($response->getBody(), true);
    }

    public function getDataset(string $datasetId): array
    {
        $response = $this->client->get(sprintf('/v2/datasets/%s', $datasetId));
        return \json_decode($response->getBody(), true);
    }

    public function getDatasetItems(string $datasetId, array $query = []): array
    {
        $response = $this->client->get(sprintf('/v2/datasets/%s/items', $datasetId), [
            'query' => $query
        ]);
        return \json_decode($response->getBody(), true);
    }
}
