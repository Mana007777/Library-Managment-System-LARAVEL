<?php

use App\Models\User;
use App\Models\Loan;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('has many loans', function () {
    $user = User::factory()->create();
    Loan::factory()->create(['user_id' => $user->id]);

    expect($user->loans)->toHaveCount(1);
});

it('has many reviews', function () {
    $user = User::factory()->create();
    Review::factory()->create(['user_id' => $user->id]);

    expect($user->reviews)->toHaveCount(1);
});

it('has many reservations', function () {
    $user = User::factory()->create();
    Reservation::factory()->create(['user_id' => $user->id]);

    expect($user->reservations)->toHaveCount(1);
});
