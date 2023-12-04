<?php

namespace App\Repositories;

use \Exception;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    public function createUser(Request $request): User
    {
        DB::beginTransaction();

        try {
            $user = User::create($request->toArray());
            $user->assignRole($request->role);

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
    }

    public function getUserAuthenticated(Request $request): User | null
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->token = $user->createToken('Wivenn Token')->accessToken;
            return $user;
        }

        return null;
    }

    public function getUserById(Request $request)
    {
        return User::find($request->id);
    }

    public function revokeUserAuthenticated(Request $request): bool
    {
        if (Auth::user()) {
            return $request->user()->token()->revoke();
        }
    }

    public function getEmailForVerification(User $user): bool
    {
        return $user->getEmailForVerification();
    }

    public function hasVerifiedEmail(User $user): bool
    {
        return $user->hasVerifiedEmail();
    }

    public function markEmailAsVerified(User $user): void
    {
        DB::beginTransaction();

        try {
            $user->markEmailAsVerified();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
    }
}
