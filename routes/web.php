<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Auth routes
Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post("/handle_login", [AuthController::class, 'handleLogin'])->name('handle_login');

Route::get("/register", [AuthController::class, 'register'])->name('register');
Route::post("/handle_register", [AuthController::class, 'handleRegister'])->name('handle_register');

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // Home page
    Route::get('/', [UserController::class, 'index'])->name('home');

    // create todo
    Route::post("/todos/create", [TodoController::class, 'create'])->name('handle_create_todo');

    // delete todo
    Route::get("/todos/{todo}/delete", [TodoController::class, 'delete'])->name('delete_todo');

    // logout
    Route::get("/logout", [AuthController::class, 'logout'])->name('logout');

});