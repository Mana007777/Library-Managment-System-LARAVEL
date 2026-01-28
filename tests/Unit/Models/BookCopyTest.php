<?php

use App\Models\BookCopy;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('belongs to a book', function () {
    $copy = BookCopy::factory()->create();

    expect($copy->book)->not->toBeNull();
});
