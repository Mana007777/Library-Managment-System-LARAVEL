<?php

use App\Models\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('belongs to a user', function () {
    $loan = Loan::factory()->create();

    expect($loan->user)->not->toBeNull();
});

it('belongs to a book copy', function () {
    $loan = Loan::factory()->create();

    expect($loan->copy)->not->toBeNull();
});
