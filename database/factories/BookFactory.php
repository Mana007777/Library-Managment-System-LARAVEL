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
            'isbn' => $this->faker->unique()->isbn13,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'publisher_id' => Publisher::factory(),
            'publication_year' => $this->faker->year,
            'language' => 'EN',
            'pages' => $this->faker->numberBetween(100, 800),
            'cover_image' => null,
        ];
    }
}
