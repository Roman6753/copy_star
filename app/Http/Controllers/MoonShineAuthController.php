<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoonShineAuthController extends Controller
{
    public function redirectToMoonShine()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Доступ запрещен. Только для администраторов.');
        }


        return redirect('/moonshine');
    }
}