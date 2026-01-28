<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookCopyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'barcode' => $this->barcode,
            'status' => $this->status,
            'condition' => $this->condition,
            'shelf_location' => $this->shelf_location,

            'book' => new BookSlimResource($this->book),
        ];
    }
}
