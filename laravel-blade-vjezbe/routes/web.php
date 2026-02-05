<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/vjezba1', function () {
    return view('vjezba1');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/varijable', [ProductController::class, 'showVariables']);

//Route::get('/proizvodi', [ProductController::class, 'list']);
//Route::get('/proizvodi/card', [ProductController::class, 'listCards']);
//Route::get('/proizvodi/create', [ProductController::class, 'create']);
//Route::post('/proizvodi/store', [ProductController::class, 'store']);
//Route::get('/proizvodi/json', [ProductController::class, 'jsonList']);

Route::prefix('proizvodi')
    ->controller(ProductController::class)
    ->group(function() {

    Route::get('/','list')->name('proizvodi.index');
    Route::get('/cards','listCards')->name('proizvodi.cards');
    Route::get('/create','create')->name('proizvodi.create');
    Route::post('/store','store')->name('proizvodi.store');
    Route::get('/json','jsonList')->name('proizvodi.json')->middleware('check.expired.products');
});

Route::get('/kontakt', [ContactController::class, 'create'])->name('kontakt.create');

Route::post('/kontakt/poslano', [ContactController::class, 'store'])->name('kontakt.store');