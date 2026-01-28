<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;

class BookController extends Controller
{
    public function __construct(private BookService $service) {}

    public function index()
    {
        return BookResource::collection(
            Book::with([
                'publisher',
                'authors',
                'categories',
                'copies',
                'reviews.user'
            ])->get()
        );
    }

    public function store(StoreBookRequest $request)
    {
        return new BookResource(
            $this->service->store($request->validated())
        );
    }

    public function update(StoreBookRequest $request, Book $book)
    {
        return new BookResource(
            $this->service->update($book, $request->validated())
        );
    }

    public function destroy(Book $book)
    {
        $this->service->delete($book);
        return response()->noContent();
    }
}
