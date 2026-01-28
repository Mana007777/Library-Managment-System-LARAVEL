<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'reserved_at' => $this->reserved_at?->toISOString(),
            'expires_at' => $this->expires_at?->toISOString(),

            'user' => new UserResource($this->user),
            'book' => new BookResource($this->book),
        ];
    }
}
