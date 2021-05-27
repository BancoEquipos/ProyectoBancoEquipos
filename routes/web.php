<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('logIn');
});

Route::get('/print', function () {
    return view('print');
});

Route::get('/email', function () {
    return view('email');
});

Route::get('/signUp', function () {
    return view('signUp');
});
