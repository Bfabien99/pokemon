<?php

use App\Http\Controllers\PokedexController;
use Illuminate\Support\Facades\Route;

Route::controller(PokedexController::class)->group(function(){
    Route::get('/', 'list')->name('pokemon.list');
    Route::get('/types', 'pokemon_types')->name('pokemon.types');
    Route::get('/types/{type}', 'pokemon_type_detail')->name('pokemon.type.detail');
    Route::get('/{pokemon_name}', 'show')->name('pokemon.detail');
});
