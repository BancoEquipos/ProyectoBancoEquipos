<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/vistaAlumno', function () {
    if (Auth::check() && strpos(Auth::user()->email,'alu.murciaeduca.es')) {
        return view('vistaAlumno');
    } else if (Auth::check() && strpos(Auth::user()->email,'murciaeduca.es')) {
        return 'Eres profesor';
    } else {
        return 'Persona no autorizada';
    }
});

Route::get('/solicitudPrestamo', function () {
    if (Auth::check() && strpos(Auth::user()->email,'alu.murciaeduca.es')) {
        return view('solicitudPrestamo');
    } else if (Auth::check() && strpos(Auth::user()->email,'murciaeduca.es')) {
        return 'Eres profesor';
    } else {
        return 'Persona no autorizada';
    }
});

Route::get('/logOut', function () {
    if (Auth::check()) {
        Auth::logout();
        return 'Log Out complete';
    } else {
        return 'No estabas logeado por lo que no hemos podido deslogear.';
    }
});

Route::get('/offline', function () {
    return view('offline');
});
