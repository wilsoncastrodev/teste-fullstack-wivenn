<?php

namespace App\Interfaces\Repositories;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

interface ReservationRepositoryInterface
{
    /**
     * Consulta todas as reservas
     *
     * @return Collection Reservas que foram encontradas.
     */
    public function getAllReservation(): Collection;

    /**
     * Cria uma nova Reserva
     *
     * @param Request Objeto contendo o ID do Livro
     *
     * @return Reservation Reserva que foi armazenada.
     */
    public function createReservation(Request $request): Reservation;

    /**
     * Cancela uma Reserva
     *
     * @param Reservation Objeto contendo os dados da Reserva
     *
     * @return Reservation Reserva que foi armazenada.
     */
    public function cancelReservation(Reservation $reservation): Reservation;
}
