<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {
        if (!$request->user() ||
            ($request->user() instanceof MustVerifyEmail &&
            !$request->user()->hasVerifiedEmail())
            ) {
            return response()->json(['message' => 'Seu endereço de e-mail ainda não foi verificado.'], 403);
        }

        return $next($request);
    }
}
