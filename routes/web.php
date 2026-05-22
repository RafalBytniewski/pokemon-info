<?php

use App\Http\Controllers\BannedPokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/banned', [BannedPokemonController::class, 'index'])->name('banned.index');
Route::post('/banned', [BannedPokemonController::class, 'store'])->name('banned.store');
Route::post('/banned', [BannedPokemonController::class, 'store'])->name('banned.store');
Route::delete('/banned/{name}', [BannedPokemonController::class, 'destroy'])->name('banned.destroy');


