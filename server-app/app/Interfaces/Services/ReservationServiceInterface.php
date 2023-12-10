<?php

namespace App\Interfaces\Services;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface ReservationServiceInterface
{
    /**
     * Serviço para consultar todas as reservas
     *
     * @return ResourceCollection Reservas que foram encontradas.
     */
    public function getAllReservation(): ResourceCollection;

    /**
     * Serviço para criar uma nova reserva
     *
     * @param Request Objeto contendo o ID do Livro
     *
     * @return JsonResource Reserva que foi armazenada.
     */
    public function createReservation(Request $request): JsonResource;

    /**
     * Serviço para cancelar uma reserva
     *
     * @param Reservation Objeto contendo os dados da Reserva
     *
     * @return JsonResource Reserva que foi cancelada.
     */
    public function cancelReservation(Reservation $reservation): JsonResource;
}
