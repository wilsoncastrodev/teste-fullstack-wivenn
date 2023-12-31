<?php

namespace App\Http\Resources;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'cover' => $this->cover,
            'publisher' => $this->publisher,
            'isbn' => $this->isbn,
            'pages' => $this->pages,
            'is_available' => $this->is_available,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        if (!empty($this->pivot)) {
            $array['reservation']['id'] = $this->pivot->id;
            $array['reservation']['due_date'] = $this->pivot->due_date;
            $array['reservation']['status'] = $this->pivot->status;
        }

        return $array;
    }
}
