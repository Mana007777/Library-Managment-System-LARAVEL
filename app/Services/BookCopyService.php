<?php

namespace App\Services;

use App\Models\BookCopy;

class BookCopyService
{
    public function store(array $data): BookCopy
    {
        return BookCopy::create($data);
    }

    public function update(BookCopy $copy, array $data): BookCopy
    {
        $copy->update($data);
        return $copy;
    }

    public function delete(BookCopy $copy): void
    {
        $copy->delete();
    }
}
