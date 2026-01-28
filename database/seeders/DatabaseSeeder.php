<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Publisher,
    Author,
    Category,
    Book,
    BookCopy,
    Loan,
    Fine,
    Reservation,
    Review,
    Notification,
    ActivityLog,
    Setting
};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Users
        User::factory(20)->create();

        // Publishers & Authors
        Publisher::factory(5)->create();
        Author::factory(15)->create();

        // Categories
        $categories = Category::factory(5)->create();

        // Books
        $books = Book::factory(10)->create();

        // Attach authors & categories
        $books->each(function ($book) use ($categories) {
            $book->authors()->attach(
                Author::inRandomOrder()->take(rand(1, 3))->pluck('id')
            );

            $book->categories()->attach(
                $categories->random(rand(1, 2))->pluck('id')
            );
        });

        // Book Copies
        $books->each(function ($book) {
            BookCopy::factory(rand(2, 5))->create([
                'book_id' => $book->id
            ]);
        });

        // Loans
        Loan::factory(10)->create();

        // Fines (only for some loans)
        Loan::inRandomOrder()->take(3)->each(function ($loan) {
            Fine::factory()->create(['loan_id' => $loan->id]);
        });

        // Reservations
        Reservation::factory(5)->create();

        // Reviews
        Review::factory(15)->create();

        // Notifications
        Notification::factory(10)->create();

        // Activity Logs
        ActivityLog::factory(20)->create();

        // Settings
        Setting::factory()->create([
            'key' => 'max_loan_days',
            'value' => '14',
        ]);
    }
}
