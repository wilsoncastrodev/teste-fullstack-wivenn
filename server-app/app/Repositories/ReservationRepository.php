<?php

namespace App\Repositories;

use \Exception;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Repositories\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function getAllReservation(): Collection
    {
        return Reservation::with('user', 'book')->orderBy('created_at', 'desc')->get();
    }

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

    public function cancelReservation(Reservation $reservation): Reservation
    {
        DB::beginTransaction();
        try {
            $reservation->update(['status' => 'Cancelado']);
            $reservation->book->update(['is_available' => true]);
            DB::commit();
            return $reservation->refresh();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
    }
}
