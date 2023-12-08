<?php

namespace App\Repositories;

use \Exception;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Repositories\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function createReservation(Request $request): Reservation
    {
        DB::beginTransaction();
        try {
            $reservation = Reservation::create($request->all());
            $reservation->book->update(['is_available' => false]);
            DB::commit();
            return $reservation->refresh();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
    }
}
