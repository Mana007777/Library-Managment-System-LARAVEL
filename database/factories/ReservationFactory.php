<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'reserved_at' => now(),
            'expires_at' => now()->addDays(3),
            'status' => 'active',
        ];
    }
}
