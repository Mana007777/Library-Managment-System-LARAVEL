<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{
    public function store(array $data): Reservation
    {
        return Reservation::create($data);
    }

    public function cancel(Reservation $reservation): void
    {
        $reservation->update(['status' => 'cancelled']);
    }
}
