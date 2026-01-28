<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    public function __construct(private AuthorService $service) {}

    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    public function store(StoreAuthorRequest $request)
    {
        return new AuthorResource(
            $this->service->store($request->validated())
        );
    }

    public function update(StoreAuthorRequest $request, Author $author)
    {
        return new AuthorResource(
            $this->service->update($author, $request->validated())
        );
    }

    public function destroy(Author $author)
    {
        $this->service->delete($author);
        return response()->noContent();
    }
}
