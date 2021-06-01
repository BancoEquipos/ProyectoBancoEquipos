<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/print', function () {
    return view('print');
});

Route::get('/email', function () {
    return view('email');
});

Route::get('/notAutorithed', function () {
    return view('peopleNotAutorithed');
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
