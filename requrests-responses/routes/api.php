<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResponseController;

Route::post('/products',[RequestController::class,'store']);
Route::any('/debug-request',[RequestController::class,'debugRequest']);

//validacije
Route::post('/products-validated',[RequestController::class,'storeValidated']);
Route::post('/users-validated',[RequestController::class,'storeUserValidated']);
Route::post('/basic-validated',[RequestController::class,'storeBasicValidated']);

Route::delete('/response-no-content',[ResponseController::class,'noContent']);

Route::post('/vehicle/store',[RequestController::class,'storeCar']);