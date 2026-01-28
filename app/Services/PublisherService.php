<?php

namespace App\Services;

use App\Models\Publisher;

class PublisherService
{
    public function store(array $data): Publisher
    {
        return Publisher::create($data);
    }

    public function update(Publisher $publisher, array $data): Publisher
    {
        $publisher->update($data);
        return $publisher;
    }

    public function delete(Publisher $publisher): void
    {
        $publisher->delete();
    }
}
