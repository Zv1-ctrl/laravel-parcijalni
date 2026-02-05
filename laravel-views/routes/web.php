<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kopija', function () {
    return view('kopija');
});

Route::get('/cisti', function () {
    return view('cisti');
});