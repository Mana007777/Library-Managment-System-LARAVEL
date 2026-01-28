<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookService
{
    public function store(array $data): Book
    {
        return DB::transaction(function () use ($data) {
            $book = Book::create($data);

            $book->authors()->sync($data['authors'] ?? []);
            $book->categories()->sync($data['categories'] ?? []);

            return $book;
        });
    }

    public function update(Book $book, array $data): Book
    {
        return DB::transaction(function () use ($book, $data) {
            $book->update($data);

            if (isset($data['authors'])) {
                $book->authors()->sync($data['authors']);
            }

            if (isset($data['categories'])) {
                $book->categories()->sync($data['categories']);
            }

            return $book;
        });
    }

    public function delete(Book $book): void
    {
        $book->delete();
    }
}
