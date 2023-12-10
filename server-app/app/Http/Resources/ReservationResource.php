<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $array = [
            'id' => $this->id,
            'due_date' => $this->due_date,
            'status' => $this->status,
            'book_id' => $this->book_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        if (!empty($this->book) && !empty($this->user)) {
            $array['book'] = $this->book;
            $array['user'] = $this->user;
        }

        return $array;
    }
}
