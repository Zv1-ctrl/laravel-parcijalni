<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\VrijemeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     Route::get('/kategorije', [KategorijaController::class, 'index'])
        ->name('kategorije.index');

     // lista za sve logirane
    Route::get('/proizvodi', [ProizvodController::class, 'index'])
        ->name('proizvodi.index');

     // CREATE + STORE (admin + korisnik)
    Route::get('/proizvodi/create', [ProizvodController::class, 'create'])
        ->name('proizvodi.create');

    Route::post('/proizvodi', [ProizvodController::class, 'store'])
        ->name('proizvodi.store');


    //CREATE za dodavanje nove kategorije općenito
        Route::get('/proizvodi/createnew', [ProizvodController::class, 'createnew'])
        ->name('proizvodi.createnew');

    Route::post('/proizvodinew', [ProizvodController::class, 'storenew'])
        ->name('proizvodi.storenew');

    //search proizvodi
        Route::get('/proizvodi/search', [ProizvodController::class, 'search'])
        ->name('proizvodi.search');

    //accuweather
    Route::get('/vrijeme', [VrijemeController::class, 'index'])->name('vrijeme.index');

// Dohvat po unosu grada (forma gore)
Route::post('/vrijeme/fetch', [VrijemeController::class, 'fetch'])->name('vrijeme.fetch');

// Osvježi iz tablice (gumb ispod)
Route::post('/vrijeme/refresh', [VrijemeController::class, 'refresh'])->name('vrijeme.refresh');

    Route::middleware(['admin'])->group(function () {

        Route::get('/kategorije/create', [KategorijaController::class, 'create'])
            ->name('kategorije.create');

        Route::post('/kategorije', [KategorijaController::class, 'store'])
            ->name('kategorije.store');

        Route::get('/kategorije/{kategorija}/edit', [KategorijaController::class, 'edit'])
            ->name('kategorije.edit');

        Route::put('/kategorije/{kategorija}', [KategorijaController::class, 'update'])
            ->name('kategorije.update');

        Route::delete('/kategorije/{kategorija}', [KategorijaController::class, 'destroy'])
            ->name('kategorije.destroy');

        Route::get('/proizvodi/{proizvod}/edit', [ProizvodController::class, 'edit'])
            ->name('proizvodi.edit');

        Route::put('/proizvodi/{proizvod}', [ProizvodController::class, 'update'])
            ->name('proizvodi.update');

        Route::delete('/proizvodi/{proizvod}', [ProizvodController::class, 'destroy'])
            ->name('proizvodi.destroy');
    });
});

// Route::get('/admin/users', [AdminUserController::class, 'index'])
//     ->middleware(['auth', 'admin'])
//     ->name('admin.users.index');

Route::middleware(['auth', 'admin'])->prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');

    Route::get('/{user}/edit', [AdminUserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [AdminUserController::class, 'update'])->name('update');

    Route::delete('/{user}', [AdminUserController::class, 'destroy'])
    ->name('destroy');

});

require __DIR__.'/auth.php';
