<?php

use App\Services\CategoryService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/show-categories', function() {

    $service = new CategoryService();
    $categories = $service->getAll();

    $output = '<h3>Kategorije</h3><ul>';

    foreach($categories as $category){
        $output.= "<li>{$category->opis} (popularnost: {$category->popularnost})</li>";
    }

    $output.="</ul>";

    return $output;
})->middleware('check.categories');