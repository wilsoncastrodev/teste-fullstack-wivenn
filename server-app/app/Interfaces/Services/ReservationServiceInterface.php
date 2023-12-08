<?php

namespace App\Interfaces\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

interface ReservationServiceInterface
{
    /**
     * Serviço para criar uma nova reserrva
     *
     * @param Request Objeto contendo o ID do Livro
     *
     * @return JsonResource Reserva que foi armazenado.
     */
    public function createReservation(Request $request): JsonResource;
}
