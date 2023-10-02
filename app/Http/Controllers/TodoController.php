<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create(Request $request)
    {
        // Check if important was checked
        $important = $request->has('important');

        // Validate data
        $values = $request->validate([
            'name' => 'required|unique:todos',
        ]);

        $todo = [];

        if ($important) {

            $todo = ['name' => $values['name'], 'important' => true, 'done' => false, 'user_id' => auth()->user()->id];
        } else {
            $todo = ['name' => $values['name'], 'important' => false, 'done' => false, 'user_id' => auth()->user()->id];
        }

        // create todo
        Todo::create($todo);


        // redirect to home page
        return redirect(route('home'));


    }


    public function delete(Todo $todo)
    {
        $todo->delete();

        return redirect(route('home'));
    }

    public function complete(Todo $todo)
    {

        $todo->update(['done' => true]);

        return redirect(route('home'));

    }


}