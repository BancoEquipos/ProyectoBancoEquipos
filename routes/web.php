<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

//Route::middleware(['routes'])->group(function () {
    Route::get('/vistaAlumno', function () {
        return view('vistaAlumno');
    });

    Route::get('/vistaProfesor', function () {
        return view('vistaProfesor');
    });
    Route::get('/notAutorithed', function () {
        return view('peopleNotAutorithed');
    });
//});
