<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[а-яА-Я\s\-]+$/u',
            'surname' => 'required|regex:/^[а-яА-Я\s\-]+$/u',
            'patronymic' => 'nullable|regex:/^[а-яА-Я\s\-]+$/u',
            'login' => 'required|unique:users|regex:/^[a-zA-Z0-9\-]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_repeat' => 'required|same:password',
            'rules' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return to_route('about');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            return to_route('about');
        }

        return response()->json(['errors' => ['login' => 'Неверный логин или пароль']], 400);
    }

    public function logout()
    {
        Auth::logout();
        return to_route('about');
    }
}