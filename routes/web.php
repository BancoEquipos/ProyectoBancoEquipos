<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/solicitudPrestamo', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return 'solicitud Prestamo';
    } else {
        return 'No estas logeado';
    }
});
