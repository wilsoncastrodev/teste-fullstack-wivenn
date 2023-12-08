<?php

namespace App\Interfaces\Repositories;

use App\Models\Reservation;
use Illuminate\Http\Request;

interface ReservationRepositoryInterface
{
    /**
     * Cria uma nova Reserva
     *
     * @param Request Objeto contendo o ID do Livro
     *
     * @return Reservation Reserva que foi armazenada.
     */
    public function createReservation(Request $request): Reservation;
}
