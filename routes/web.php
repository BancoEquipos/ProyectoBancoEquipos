<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/alumno', function () {
    if (Auth::check() && strpos(Auth::user()->email,'alu.murciaeduca.es')) {
        $nre = explode("@", Auth::user()->email);
        return view('alumno', array('userName' => Auth::user()->name, 'email' => Auth::user()->email, 'nre' => $nre[0], 'lastLog' => Auth::user()->updated_at));
    } else if (Auth::check() && strpos(Auth::user()->email,'murciaeduca.es')) {
        $nre = explode("@", Auth::user()->email);
        return view('profesor', array('userName' => Auth::user()->name, 'email' => Auth::user()->email, 'nre' => $nre[0], 'lastLog' => Auth::user()->updated_at));
    } else {
        return view('restringido');
    }
});

Route::get('/profesor', function () {
    if (Auth::check() && strpos(Auth::user()->email,'alu.murciaeduca.es')) {
        $nre = explode("@", Auth::user()->email);
        return view('alumno', array('userName' => Auth::user()->name, 'email' => Auth::user()->email, 'nre' => $nre[0], 'lastLog' => Auth::user()->updated_at));
    } else if (Auth::check() && strpos(Auth::user()->email,'murciaeduca.es')) {
        return view('profesor');
    } else {
        return view('restringido');
    }
});

Route::get('/solicitudPrestamo', function () {
    if (Auth::check() && strpos(Auth::user()->email,'alu.murciaeduca.es')) {
        return view('solicitudPrestamo');
    } else if (Auth::check() && strpos(Auth::user()->email,'murciaeduca.es')) {
        return 'Eres profesor';
    } else {
        return view('restringido');
    }
});

Route::get('/logOut', function () {
    if (Auth::check()) {
        Auth::logout();
        return view('logOut');
    } else {
        return view('logOutError');
    }
});
