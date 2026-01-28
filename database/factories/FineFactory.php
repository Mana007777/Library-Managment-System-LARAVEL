<?php

namespace Database\Factories;

use App\Models\Fine;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

class FineFactory extends Factory
{
    protected $model = Fine::class;

    public function definition(): array
    {
        return [
            'loan_id' => Loan::factory(),
            'amount' => fake()->randomFloat(2, 1, 50),
            'reason' => 'Late return',
            'paid' => false,
            'paid_at' => null,
        ];
    }
}
