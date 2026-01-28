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
            'barcode' => $this->faker->unique()->ean13,
            'shelf_location' => 'A-' . $this->faker->numberBetween(1, 50),
            'condition' => $this->faker->randomElement(['new', 'good', 'damaged']),
            'status' => 'available',
        ];
    }
}
