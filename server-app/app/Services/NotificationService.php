<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\Services\NotificationServiceInterface;

class NotificationService implements NotificationServiceInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getReservationsNotifiedLibrarian(): Collection
    {
        $user = $this->userRepository->getUserAuth();
        return $user->notifications;
    }
}
