<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Resources\ReservationResource;
use App\Repositories\ReservationRepository;
use Illuminate\Support\Facades\Notification;
use App\Http\Resources\ReservationCollection;
use App\Notifications\NotificationReservation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Interfaces\Services\ReservationServiceInterface;

class ReservationService implements ReservationServiceInterface
{
    private ReservationRepository $reservationRepository;
    private UserRepository $userRepository;

    public function __construct(
        ReservationRepository $reservationRepository,
        UserRepository $userRepository
    ) {
        $this->reservationRepository = $reservationRepository;
        $this->userRepository = $userRepository;
    }

    public function getAllReservation(): ResourceCollection
    {
        $reservations = $this->reservationRepository->getAllReservation();
        return new ReservationCollection($reservations);
    }

    public function createReservation(Request $request): JsonResource
    {
        $reservation = $this->reservationRepository->createReservation($request);
        $users = $this->userRepository->getAllLibrarian();
        Notification::send($users, new NotificationReservation($reservation));

        return new ReservationResource($reservation);
    }

    public function cancelReservation(Reservation $reservation): JsonResource
    {
        $reservation = $this->reservationRepository->cancelReservation($reservation);
        $users = $this->userRepository->getAllLibrarian();
        Notification::send($users, new NotificationReservation($reservation));
        return new ReservationResource($reservation);
    }
}
