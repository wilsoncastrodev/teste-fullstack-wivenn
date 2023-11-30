<?php

namespace App\Repositories;

use \Exception;
use App\Interfaces\Repositories\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(Request $request): User
    {
        DB::beginTransaction();

        try {
            $user = User::create($request->toArray());
            $user->token = $user->createToken('Wivenn Token')->accessToken;
            $user->assignRole($request->role);

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
    }

    public function login(Request $request): User | null
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->token = $user->createToken('Wivenn Token')->accessToken;
            return $user;
        }

        return null;
    }

    public function logout(Request $request): bool
    {
        if (Auth::user()) {
            return $request->user()->token()->revoke();
        }
    }
}
