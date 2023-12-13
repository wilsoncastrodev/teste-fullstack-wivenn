<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required',
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
            'name.required' => 'O campo "Nome" é obrigatório',
            'name.min' => 'O campo "Nome" não pode ser inferior a :min caracteres',
            'email.required' => 'O campo "E-mail" é obrigatório',
            'email.email' => 'O campo "E-mail" deve ser um endereço de E-mail válido',
            'email.unique' => 'O campo "E-mail" já está sendo utilizado',
            'password.required' => 'O campo "E-mail" é obrigatório',
        ];
    }
}
