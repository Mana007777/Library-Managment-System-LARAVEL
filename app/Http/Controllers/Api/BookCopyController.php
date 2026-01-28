<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookCopyRequest;
use App\Http\Resources\BookCopyResource;
use App\Models\BookCopy;
use App\Services\BookCopyService;

class BookCopyController extends Controller
{
    public function __construct(private BookCopyService $service) {}

    public function index()
    {
        return BookCopyResource::collection(
            BookCopy::with('book')->get()
        );
    }

    public function store(StoreBookCopyRequest $request)
    {
        return new BookCopyResource(
            $this->service->store($request->validated())
        );
    }

    public function update(StoreBookCopyRequest $request, BookCopy $bookCopy)
    {
        return new BookCopyResource(
            $this->service->update($bookCopy, $request->validated())
        );
    }

    public function destroy(BookCopy $bookCopy)
    {
        $this->service->delete($bookCopy);
        return response()->noContent();
    }
}
