<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Cached password
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),

            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),

            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),

            // 👇 Library domain fields
            'role' => fake()->randomElement([
                'admin',
                'librarian',
                'member',
            ]),

            'status' => fake()->randomElement([
                'active',
                'suspended',
            ]),

            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
        ];
    }

    /**
     * User with unverified email
     */
    public function unverified(): static
    {
        return $this->state(fn () => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * State: active user
     */
    public function active(): static
    {
        return $this->state(fn () => [
            'status' => 'active',
        ]);
    }

    /**
     * State: suspended user
     */
    public function suspended(): static
    {
        return $this->state(fn () => [
            'status' => 'suspended',
        ]);
    }

    /**
     * State: admin user
     */
    public function admin(): static
    {
        return $this->state(fn () => [
            'role' => 'admin',
            'status' => 'active',
        ]);
    }

    /**
     * State: librarian user
     */
    public function librarian(): static
    {
        return $this->state(fn () => [
            'role' => 'librarian',
            'status' => 'active',
        ]);
    }

    /**
     * State: member user
     */
    public function member(): static
    {
        return $this->state(fn () => [
            'role' => 'member',
            'status' => 'active',
        ]);
    }
}
