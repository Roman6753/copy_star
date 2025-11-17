<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use MoonShine\Laravel\Models\MoonshineUser;

class MoonShineAutoAuth
{
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->is_admin) {
            $moonshineUser = MoonshineUser::where('email', Auth::user()->email)->first();
            
            if ($moonshineUser) {
                auth('moonshine')->login($moonshineUser);
            }
        }

        return $next($request);
    }
}