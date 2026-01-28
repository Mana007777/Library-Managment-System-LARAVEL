<?php

use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('belongs to a user', function () {
    $review = Review::factory()->create();

    expect($review->user)->not->toBeNull();
});

