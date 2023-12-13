<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Collection;

interface NotificationServiceInterface
{
    /**
     * Serviço para obter todas as notificações de reservas de livros do Bibliotecário autenticado
     *
     * @return Collection Retorna todas as notificações de reservas de livros.
     */
    public function getReservationsNotifiedLibrarian(): Collection;
}
