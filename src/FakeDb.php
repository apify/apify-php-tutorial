<?php

namespace Apify\ExamplePhpProject;

/**
 * Very simple, DEFINITELY NOT PRODUCTION SUITABLE class
 */
class FakeDb
{
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    private function loadDb(): array
    {
        $rawData = @file_get_contents($this->filename);
        return json_decode($rawData ? $rawData : '{}', true);
    }

    private function flushDb(array $data): void
    {
        file_put_contents($this->filename, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function save(string $key, array $data)
    {
        $database = $this->loadDb();
        $database[$key] = $data;
        $this->flushDb($database);
    }

    public function load(string $key): ?array
    {
        $database = $this->loadDb();
        return $database[$key] ?? null;
    }
}