<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
});

Route::get('print', function () {
    return view('print');
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('vistaAlumno', function () {
    if (Auth::check() && strpos(Auth::user()->email,'alu.murciaeduca.es')) {
        $nre = explode("@", Auth::user()->email);
        return view('alumno', array('userName' => Auth::user()->name, 'email' => Auth::user()->email, 'nre' => $nre[0], 'lastLog' => Auth::user()->updated_at, 'avatar' => Auth::user()->avatar));
    } else if (Auth::check() && strpos(Auth::user()->email,'murciaeduca.es')) {
        $nre = explode("@", Auth::user()->email);
        return view('profesor', array('userName' => Auth::user()->name, 'email' => Auth::user()->email, 'nre' => $nre[0], 'lastLog' => Auth::user()->updated_at, 'avatar' => Auth::user()->avatar));
    } else {
        return view('restringido');
    }
});

Route::get('vistaProfesor', function () {
    if (Auth::check() && strpos(Auth::user()->email,'alu.murciaeduca.es')) {
        $nre = explode("@", Auth::user()->email);
        return view('alumno', array('userName' => Auth::user()->name, 'email' => Auth::user()->email, 'nre' => $nre[0], 'lastLog' => Auth::user()->updated_at, 'avatar' => Auth::user()->avatar));
    } else if (Auth::check() && strpos(Auth::user()->email,'murciaeduca.es')) {
        $nre = explode("@", Auth::user()->email);
        return view('profesor', array('userName' => Auth::user()->name, 'email' => Auth::user()->email, 'nre' => $nre[0], 'lastLog' => Auth::user()->updated_at, 'avatar' => Auth::user()->avatar));
    } else {
        return view('restringido');
    }
});

Route::get('loginout', function () {
    if (Auth::check()) {
        Auth::logout();
        return view('logOut');
    } else {
        return view('logOutError');
    }
});

Route::get('noAutorizado', function () {
    return view('logOutError');
});

Route::get('incidencias',function () {
    return view('incidencia', array('avatar' => Auth::user()->avatar));
});

Route::get('solicitudPrestamo',function () {
    $nre = explode("@", Auth::user()->email);
    $portions = explode(" ", Auth::user()->name);
    return view('prestamo', array('apellido1' => $portions[0],'apellido2' => $portions[1],'nombre' => $portions[2], 'email' => Auth::user()->email, 'nre' => $nre[0], 'avatar' => Auth::user()->avatar));
});
