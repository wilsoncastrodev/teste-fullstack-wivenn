<?php

namespace App\Http\Controllers\Api;

use \Exception;
use Illuminate\Http\Response;
use App\Services\NotificationService;
use App\Http\Controllers\Api\BaseController;

class NotificationController extends BaseController
{
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function reservationNotifiedLibrarian(): Response
    {
        try {
            $notifications = $this->notificationService->getReservationsNotifiedLibrarian();
            return $this->sendResponse($notifications);
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }
}
