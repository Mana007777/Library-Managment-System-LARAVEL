<?php

namespace Database\Factories;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityLogFactory extends Factory
{
    protected $model = ActivityLog::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'action' => 'loan.created',
            'model' => 'Loan',
            'model_id' => rand(1, 100),
            'meta' => ['ip' => $this->faker->ipv4],
        ];
    }
}
