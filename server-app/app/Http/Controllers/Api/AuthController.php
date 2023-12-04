<?php

namespace App\Http\Controllers\Api;

use \Exception;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Api\BaseController;

class AuthController extends BaseController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = $this->authService->register($request);
            return $this->sendResponse($user);
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->authService->login($request);
            return !empty($user->resource)
                ? $this->sendResponse($user)
                : $this->sendError('Usuário não autenticado', 401);
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->authService->logout($request);
            return $this->sendResponse("", 200, "Usuário deslogado com sucesso");
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }

    public function verify(Request $request)
    {
        try {
            $verify = $this->authService->verify($request);
            return $verify ? redirect()->intended(env('CLIENT_URL') . "/login" . '?verificado=0') :
                redirect()->intended(env('CLIENT_URL') . "/login" . '?verificado=1');
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }
}
