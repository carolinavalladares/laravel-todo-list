<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Get logged in user
        $user = auth()->user();

        // Get user's to-do's 
        $todos = Todo::where('user_id', 'LIKE', auth()->user()->id)->orderBy('important', 'Desc')->get();


        return view('index', ['user' => $user, 'todos' => $todos]);
    }


}