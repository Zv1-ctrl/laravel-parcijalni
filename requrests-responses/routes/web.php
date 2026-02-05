<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [RequestController::class,'index']);
Route::get('/products/{id}', [RequestController::class,'show'])->whereNumber('id');


Route::get('/response-basic', function() {
    return response('Response 1 - ok',200);
});

Route::get('/response-json-controller',[ResponseController::class,'jsonResponse']);
Route::get('/response-json-headres',[ResponseController::class,'jsonWithHeaders']);
Route::get('/response-redirect',[ResponseController::class,'redirectWithFlash']);

Route::get('/vehicle/form',[RequestController::class,'showForm']);
