<?php

namespace App\Http\Controllers\Api;

use \Exception;
use App\Models\Reservation;
use Illuminate\Http\Response;
use App\Services\ReservationService;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Api\BaseController;

class ReservationController extends BaseController
{
    private ReservationService $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function store(ReservationRequest $request): Response
    {
        try {
            $reservations = $this->reservationService->createReservation($request);
            return $this->sendResponse($reservations);
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }

    public function cancel(Reservation $reservation): Response
    {
        try {
            $reservations = $this->reservationService->cancelReservation($reservation);
            return $this->sendResponse($reservations);
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }
}
