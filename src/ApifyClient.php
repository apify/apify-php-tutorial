<?php

namespace Apify\ExamplePhpProject;

use GuzzleHttp\Client;

class ApifyClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.apify.com',
        ]);
    }

    public function getCurrentUser(): array
    {
        $response = $this->client->get('/v2/users/me');
        return \json_decode($response->getBody(), true);
    }
}