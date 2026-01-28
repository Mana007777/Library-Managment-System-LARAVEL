<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'borrowed_at' => $this->borrowed_at?->toISOString(),
            'due_date' => $this->due_date?->toISOString(),
            'returned_at' => $this->returned_at?->toISOString(),
            'status' => $this->status,

            'user' => new UserSlimResource($this->user),
            'book_copy' => new BookCopyResource($this->copy),
        ];
    }
}
