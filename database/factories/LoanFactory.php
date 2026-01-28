<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\User;
use App\Models\BookCopy;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition(): array
    {
        $borrowedAt = now()->subDays(rand(1, 30));

        return [
            'user_id' => User::factory(),
            'book_copy_id' => BookCopy::factory(),
            'borrowed_at' => $borrowedAt,
            'due_date' => $borrowedAt->copy()->addDays(14),
            'returned_at' => null,
            'status' => 'borrowed',
        ];
    }
}
