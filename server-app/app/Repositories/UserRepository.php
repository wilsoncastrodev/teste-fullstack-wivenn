<?php

namespace App\Repositories;

use \Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
            $user->verified = false;

            if ($user->hasVerifiedEmail()) {
                $user->verified = true;
            }

            return $user;
        }

        return null;
    }

    public function getAllLibrarian(): Collection | null
    {
        $role = Role::where('name', 'librarian')->first();

        if ($role) {
            return $role->users()->get();
        }

        return null;
    }

    public function getUserById(Request $request): User
    {
        return User::find($request->id);
    }

    public function getUserAuth(): User
    {
        return Auth::user();
    }

    public function revokeUserAuthenticated(Request $request): void
    {
        if (Auth::user()) {
            $request->user()->token()->revoke();
        }
    }

    public function getEmailForVerification(User $user): string
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
