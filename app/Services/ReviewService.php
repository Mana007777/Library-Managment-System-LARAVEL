<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    public function store(array $data): Review
    {
        return Review::create($data);
    }

    public function delete(Review $review): void
    {
        $review->delete();
    }
}
