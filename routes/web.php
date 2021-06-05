<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('login');
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);


    Route::get('/vistaAlumno', function () {
        $user = Socialite::driver('google')->stateless()->user();
        return $user->getEmail();
//        if ($user->getEmail()) {
//            return 'Eres alumno';
//        } else {
//            return 'No eres alumno';
//        }
//        return view('vistaAlumno');
    });

    Route::get('/vistaProfesor', function () {
        $user=Auth::user();
        if ($user->tipoUsuario()) {
            return 'Eres profesor';
        } else {
            return 'No eres profesor';
        }
//        return view('vistaProfesor');
    });

    Route::get('/notAutorithed', function () {
        return view('peopleNotAutorithed');
    });
