<?php

namespace App\Notifications;

use App\Helpers\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NotificationReservation extends Notification
{
    use Queueable;

    private $reservation;

    /**
     * Create a new notification instance.
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via()
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase()
    {
        if ($this->reservation->status === "Reservado") {
            return [
                'message' => "O usuário <strong>" . $this->reservation->user->name . "</strong>" .
                    " efetuou a reserva do livro <strong>" . $this->reservation->book->title . "</strong> no dia <strong>" .
                    Helper::formatDate($this->reservation->created_at) . "</strong>. O prazo para retirada do" .
                    " livro é até o dia <strong>" . Helper::formatDate($this->reservation->due_date) . "</strong>.",
                'subject' => "Nova Reserva"
            ];
        }

        return [
            'message' => "O usuário <strong>" . $this->reservation->user->name . "</strong>" .
                " cancelou a reserva do livro <strong>" . $this->reservation->book->title . "</strong> no dia <strong>" .
                Helper::formatDate($this->reservation->created_at) . "</strong>.",
            'subject' => "Reserva Cancelada"
        ];
    }
}
