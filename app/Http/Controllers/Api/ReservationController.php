<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    public function __construct(private ReservationService $service) {}

    public function index()
    {
        return ReservationResource::collection(
            Reservation::with(['user', 'book'])->get()
        );
    }

    public function store(StoreReservationRequest $request)
    {
        return new ReservationResource(
            $this->service->store($request->validated())
        );
    }

    public function destroy(Reservation $reservation)
    {
        $this->service->cancel($reservation);
        return response()->noContent();
    }
}
