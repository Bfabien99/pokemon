<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PokedexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/search', function(Request $request){
    return to_route('pokemon.detail', $request->input('search'));
})->name('search');

Route::controller(PokedexController::class)->group(function(){
    Route::get('/', 'list')->name('pokemon.list');
    Route::get('/types', 'pokemon_types')->name('pokemon.types');
    Route::get('/types/{type}', 'pokemon_type_detail')->name('pokemon.type.detail');
    Route::get('/{pokemon_name}', 'show')->name('pokemon.detail');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/auth/login', 'login')->name('auth.login');
    Route::post('/auth/login', 'auth_login')->name('auth.login.post');
    Route::get('/auth/register', 'register')->name('auth.register');
    Route::post('/auth/register', 'auth_login')->name('auth.register.post');
});