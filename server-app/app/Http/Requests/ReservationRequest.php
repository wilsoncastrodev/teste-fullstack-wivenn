<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'book_id' => 'required|integer',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'book_id.required' => 'O "Id do Livro" é obrigatório',
            'book_id.integer' => 'O "Id do Livro" deve ser um número inteiro',
        ];
    }

    /**
     * Verifica se o usuário chegou ao limite máximo permitido de reservas ativas que é 5.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $number_reservations_user = Auth::user()->reservations->where('status', 'Reservado')->count();
            $limit_reservations = 5;

            if ($number_reservations_user >= $limit_reservations) {
                $validator->errors()->add('limit_reservation', 'O limite máximo de reservas ativas foi atingido.');
            }
        });
    }
}
