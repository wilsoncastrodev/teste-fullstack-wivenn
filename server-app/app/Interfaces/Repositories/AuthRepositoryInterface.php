<?php

namespace App\Interfaces\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    /**
     * Cria uma conta de Usuário
     *
     * @param Request $request O objeto "Usuário da Requisição"
     *
     * @return User Usuário autenticado que foi armazenado no sistema
     */
    public function register(Request $request): User;

    /**
     * Verifica e retorna o Usuário autenticado
     *
     * @param Request $request O objeto "Usuário da Requisição"
     *
     * @return User Usuário autenticado que foi recuperado do sistema
     * @return null Usuário não encontrado
     */
    public function login(Request $request): User | null;

    /**
     * Desloga o Usuário
     *
     * @param Request $request O objeto "Usuário Autenticado da Requisição"
     *
     * @return bool Retorna verdadeiro se usuário foi deslogado do sistema.
     */
    public function logout(Request $request): bool;
}
