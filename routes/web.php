<?php

use App\Http\Controllers\BannedPokemonController;
use App\Http\Controllers\PokemonInfoController;
use Illuminate\Support\Facades\Route;

Route::middleware('secret.key')->group(function () {
    Route::get('/banned', [BannedPokemonController::class, 'index'])->name('banned.index');
    Route::post('/banned', [BannedPokemonController::class, 'store'])->name('banned.store');
    Route::post('/banned', [BannedPokemonController::class, 'store'])->name('banned.store');
    Route::delete('/banned/{name}', [BannedPokemonController::class, 'destroy'])->name('banned.destroy');
});
Route::post('/info', [PokemonInfoController::class, 'info']);

