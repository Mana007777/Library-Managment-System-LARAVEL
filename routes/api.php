<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    UserController,
    PublisherController,
    AuthorController,
    CategoryController,
    BookController,
    BookCopyController,
    LoanController,
    ReservationController,
    ReviewController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Users
Route::apiResource('users', UserController::class)
    ->except(['show']);

// Publishers
Route::apiResource('publishers', PublisherController::class)
    ->except(['show']);

// Authors
Route::apiResource('authors', AuthorController::class)
    ->except(['show']);

// Categories
Route::apiResource('categories', CategoryController::class)
    ->except(['show']);

// Books
Route::apiResource('books', BookController::class)
    ->except(['show']);

// Book Copies
Route::apiResource('book-copies', BookCopyController::class)
    ->except(['show']);

// Loans (special behavior)
Route::get('loans', [LoanController::class, 'index']);
Route::post('loans', [LoanController::class, 'store']);
Route::post('loans/{loan}/return', [LoanController::class, 'return']);

// Reservations
Route::get('reservations', [ReservationController::class, 'index']);
Route::post('reservations', [ReservationController::class, 'store']);
Route::delete('reservations/{reservation}', [ReservationController::class, 'destroy']);

// Reviews
Route::get('reviews', [ReviewController::class, 'index']);
Route::post('reviews', [ReviewController::class, 'store']);
Route::delete('reviews/{review}', [ReviewController::class, 'destroy']);
