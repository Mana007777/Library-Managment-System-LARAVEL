<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use App\Services\PublisherService;

class PublisherController extends Controller
{
    public function __construct(private PublisherService $service) {}

    public function index()
    {
        return PublisherResource::collection(Publisher::all());
    }

    public function store(StorePublisherRequest $request)
    {
        return new PublisherResource(
            $this->service->store($request->validated())
        );
    }

    public function update(StorePublisherRequest $request, Publisher $publisher)
    {
        return new PublisherResource(
            $this->service->update($publisher, $request->validated())
        );
    }

    public function destroy(Publisher $publisher)
    {
        $this->service->delete($publisher);
        return response()->noContent();
    }
}
