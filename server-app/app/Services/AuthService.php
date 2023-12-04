<?php

namespace App\Services;

use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use App\Interfaces\Services\AuthServiceInterface;
use App\Mail\EmailConfirmation;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mail;

class AuthService implements AuthServiceInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request): JsonResource
    {
        $request->password = bcrypt($request->password);
        $user = $this->userRepository->createUser($request);

        Mail::to($user)->queue(new EmailConfirmation($user));

        return new RegisterResource($user);
    }

    public function login(Request $request): JsonResource
    {
        $user = $this->userRepository->getUserAuthenticated($request);
        return new LoginResource($user);
    }

    public function logout(Request $request): bool
    {
        return $this->userRepository->revokeUserAuthenticated($request);
    }

    public function verify(Request $request): bool
    {
        $user = $this->userRepository->getUserById($request);

        $email_verification = $this->userRepository->getEmailForVerification($user);

        if (!$email_verification) {
            return false;
        }

        if (!(!empty($user) && hash_equals(sha1($user->email), $request->hash))) {
            return false;
        }

        $user_has_verified_email = $this->userRepository->hasVerifiedEmail($user);

        if (!$user_has_verified_email) {
            $this->userRepository->markEmailAsVerified($user);
        }

        return true;
    }
}
