<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MoonShine\Laravel\Models\MoonshineUser;

class MoonShineAuthController extends Controller
{
    public function autoLogin()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Доступ запрещен');
        }

        $moonshineUser = MoonshineUser::where('email', Auth::user()->email)->first();

        if (!$moonshineUser) {
            abort(403, 'Пользователь MoonShine не найден');
        }


        Auth('moonshine')->login($moonshineUser);

        return redirect('/moonshine');
    }
}