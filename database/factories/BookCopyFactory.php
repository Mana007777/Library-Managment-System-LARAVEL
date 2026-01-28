<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookCopy;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookCopyFactory extends Factory
{
    protected $model = BookCopy::class;

    public function definition(): array
    {
        return [
            'book_id' => Book::factory(),
            'barcode' => fake()->unique()->ean13(),
            'shelf_location' => 'A-' .fake()->numberBetween(1, 50),
            'condition' => fake()->randomElement(['new', 'good', 'damaged']),
            'status' => 'available',
        ];
    }
}
