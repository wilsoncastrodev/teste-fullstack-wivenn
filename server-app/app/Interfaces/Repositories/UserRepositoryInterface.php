<?php

namespace App\Interfaces\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    /**
     * Cria uma conta de Usuário
     *
     * @param Request $request O objeto "Usuário da Requisição"
     *
     * @return User Retorna o Usuário autenticado que foi armazenado no sistema
     */
    public function createUser(Request $request): User;

    /**
     * Verifica e retorna o Usuário autenticado
     *
     * @param Request $request O objeto "Usuário da Requisição"
     *
     * @return User Retorna o Usuário autenticado que foi recuperado do sistema
     * @return null Usuário não encontrado
     */
    public function getUserAuthenticated(Request $request): User | null;

    /**
     * Revoga a autenticação do Usuário
     *
     * @param Request $request O objeto "Usuário Autenticado da Requisição"
     *
     * @return bool Retorna verdadeiro se usuário foi deslogado do sistema.
     */
    public function revokeUserAuthenticated(Request $request): void;

    /**
     * Obtêm o e-mail para realizar a confirmação da conta.
     *
     * @param Request $request O objeto "Usuário da Requisição"
     *
     * @return bool Retorna o endereço de e-mail do Usuário.
     */
    public function getEmailForVerification(User $user): string;

    /**
     *  Verifica se o e-mail de um Usuário foi verificado ou não
     *
     * @param Request $request O objeto "Usuário"
     *
     * @return string Retorna verdadeiro se o e-mail do usuário foi verificado e falso caso contrário.
     */
    public function hasVerifiedEmail(User $user): bool;

    /**
     * Define o e-mail do Usuário como verificado no banco de dados
     *
     * @param Request $request O objeto "Usuário"
     */
    public function markEmailAsVerified(User $user): void;
}
