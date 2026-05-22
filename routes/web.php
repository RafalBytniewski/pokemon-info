<?php

use App\Http\Controllers\BannedPokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/banned', [BannedPokemonController::class, 'index']);
