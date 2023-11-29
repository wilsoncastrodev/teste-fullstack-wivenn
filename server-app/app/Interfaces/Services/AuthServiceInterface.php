<?php

namespace App\Interfaces\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

interface AuthServiceInterface
{
    /**
     * Serviço para criar um novo Usuário
     *
     * @param Request $request O objeto "Usuário da Requisição"
     *
     * @return JsonResource Usuário autenticado que foi armazenado no sistema
     */
    public function register(Request $request): JsonResource;

    /**
     * Serviço para recuperar o Usuário autenticado sistema
     *
     * @param Request $request O objeto "Usuário da Requisição"
     *
     * @return JsonResource Usuário Autenticado que foi recuperado do sistema
     */
    public function login(Request $request): JsonResource;

    /**
     * Serviço para deslogar o Usuário por meio do token de acesso
     *
     * @param Request $request O objeto "Usuário Autenticado da Requisição"
     *
     * @return bool Retorna verdadeiro se usuário foi deslogado.
     */
    public function logout(Request $request): bool;
}
