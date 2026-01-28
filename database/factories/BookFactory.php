<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'isbn' => fake()->unique()->isbn13(),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'publisher_id' => Publisher::factory(),
            'publication_year' => fake()->year(),
            'language' => 'EN',
            'pages' => fake()->numberBetween(100, 800),
            'cover_image' => null,
        ];
    }
}
