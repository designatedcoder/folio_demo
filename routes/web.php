<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');


Route::prefix('/admin')->name('admin.users.')->group(function() {
    Route::post('/users', [UserController::class, 'store'])->name('store');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('destroy');
});





Route::get('/', function () {
    return view('welcome');
});
