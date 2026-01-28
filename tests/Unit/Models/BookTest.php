<?php

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\BookCopy;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('belongs to a publisher', function () {
    $book = Book::factory()->create();

    expect($book->publisher)->not->toBeNull();
});

it('has many copies', function () {
    $book = Book::factory()->create();
    BookCopy::factory()->count(2)->create(['book_id' => $book->id]);

    expect($book->copies)->toHaveCount(2);
});

it('belongs to many authors', function () {
    $book = Book::factory()->create();
    $authors = Author::factory()->count(2)->create();

    $book->authors()->attach($authors);

    expect($book->authors)->toHaveCount(2);
});

it('belongs to many categories', function () {
    $book = Book::factory()->create();
    $categories = Category::factory()->count(2)->create();

    $book->categories()->attach($categories);

    expect($book->categories)->toHaveCount(2);
});
