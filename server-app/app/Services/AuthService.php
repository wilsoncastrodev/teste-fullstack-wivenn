<?php

namespace App\Services;

use App\Http\Resources\AuthResource;
use App\Interfaces\Services\AuthServiceInterface;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthService implements AuthServiceInterface
{
    private AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(Request $request): JsonResource
    {
        $request->password = bcrypt($request->password);
        $user = $this->authRepository->register($request);
        return new AuthResource($user);
    }

    public function login(Request $request): JsonResource
    {
        $user = $this->authRepository->login($request);
        return new AuthResource($user);
    }

    public function logout(Request $request): bool
    {
        return $this->authRepository->logout($request);
    }
}
