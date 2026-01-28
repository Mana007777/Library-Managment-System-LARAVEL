<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'email'  => $this->email,
            'role'   => $this->role,
            'status' => $this->status,
            'phone'  => $this->phone,
            'address'=> $this->address,

            'created_at' => $this->created_at?->toISOString(),

            'loans' => LoanResource::collection($this->loans),
            'reservations' => ReservationResource::collection($this->reservations),
            'reviews' => ReviewResource::collection($this->reviews),
        ];
    }
}
