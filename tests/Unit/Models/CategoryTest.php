<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('can have a parent category', function () {
    $parent = Category::factory()->create();
    $child = Category::factory()->create(['parent_id' => $parent->id]);

    expect($child->parent)->toBeInstanceOf(Category::class);
});

it('can have children categories', function () {
    $parent = Category::factory()->create();
    Category::factory()->count(2)->create(['parent_id' => $parent->id]);

    expect($parent->children)->toHaveCount(2);
});

