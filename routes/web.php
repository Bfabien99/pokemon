<?php

use App\Http\Controllers\PokedexController;
use Illuminate\Support\Facades\Route;

Route::controller(PokedexController::class)->group(function(){
    Route::get('/', 'list')->name('pokemon.list');
    Route::get('/{pokemon_name}', 'show')->name('pokemon.detail');
});
