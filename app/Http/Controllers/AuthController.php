<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function handleLogin(Request $request)
    {
        $values = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (auth()->attempt($values)) {
            return redirect(route('home'));
        } else {
            abort(400, 'Unauthorized');
        }

    }

    public function logout(Request $request)
    {

        // For API routes
        // $request->user()->currentAccessToken()->delete();

        // for web routes
        auth()->guard('web')->logout();


        return redirect(route('login'));
    }


    public function register()
    {
        return view('register');
    }


    public function handleRegister(Request $request)
    {
        $values = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);



        User::create(['name' => $values['name'], 'email' => $values['email'], 'password' => $values['password']]);

        return redirect(route('login'));
    }


}