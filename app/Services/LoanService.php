<?php

namespace App\Services;

use App\Models\Loan;
use App\Models\BookCopy;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoanService
{
    public function borrow(array $data): Loan
    {
        return DB::transaction(function () use ($data) {
            $copy = BookCopy::where('id', $data['book_copy_id'])
                ->where('status', 'available')
                ->lockForUpdate()
                ->firstOrFail();

            $copy->update(['status' => 'borrowed']);

            return Loan::create([
                'user_id' => $data['user_id'],
                'book_copy_id' => $copy->id,
                'borrowed_at' => now(),
                'due_date' => Carbon::now()->addDays(14),
                'status' => 'borrowed',
            ]);
        });
    }

    public function return(Loan $loan): Loan
    {
        return DB::transaction(function () use ($loan) {
            $loan->update([
                'returned_at' => now(),
                'status' => 'returned',
            ]);

            $loan->copy->update(['status' => 'available']);

            return $loan;
        });
    }
}
