<?php

namespace App\Http\Resources;

use App\Http\Resources\ReservationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReservationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): AnonymousResourceCollection
    {
        return ReservationResource::collection($this->collection);
    }
}
