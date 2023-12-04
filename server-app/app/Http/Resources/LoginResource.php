<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->hasVerifiedEmail()) {
            return [
                'user' => [
                    'name' => $this->name,
                    'email' => $this->email,
                ],
                'token' => $this->email,
            ];
        }

        return [
            'user' => [
                'verified' => false,
            ],
        ];
    }
}
