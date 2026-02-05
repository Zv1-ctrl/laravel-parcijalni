<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function() {
    return 'Admin panel';
})->middleware('admin');


Route::get('/account', function (){

    return '
        <h3>Evo popisa vaših mogućnosti</h3>
        <ul>
            <li>Pregled</li>
            <li>Ažuriranje</li>
        </ul>
    ';
})->middleware('check.user');


Route::get('/account-twomidd', function (){

    return '
        <h3>Evo popisa vaših mogućnosti</h3>
        <ul>
            <li>Pregled</li>
            <li>Ažuriranje</li>
        </ul>
    ';
})->middleware('check.user','log.access');

Route::get('/inactive', function (){
    //return session('error');
    return '<h3 style="color:red;">'.session('error').'</h3>';
});