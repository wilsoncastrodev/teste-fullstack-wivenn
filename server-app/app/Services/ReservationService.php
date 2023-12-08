<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Resources\ReservationResource;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Interfaces\Services\ReservationServiceInterface;

class ReservationService implements ReservationServiceInterface
{
    private ReservationRepository $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function createReservation(Request $request): JsonResource
    {
        $reservations = $this->reservationRepository->createReservation($request);
        return new ReservationResource($reservations);
    }
}
