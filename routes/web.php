<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PokedexController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/search', function(Request $request){
    return to_route('pokemon.detail', $request->input('search'));
})->name('search');

Route::controller(PokedexController::class)->group(function(){
    Route::get('/pokemons', 'list')->name('pokemon.list');
    Route::get('/pokemons/{pokemon_name}', 'show')->name('pokemon.detail');
    Route::get('/types', 'pokemon_types')->name('pokemon.types');
    Route::get('/types/{type}', 'pokemon_type_detail')->name('pokemon.type.detail');
});

Route::middleware(['guest'])->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/auth/login', 'login')->name('login');
        Route::post('/auth/login', 'auth_login')->name('auth.login');
        Route::get('/auth/register', 'register')->name('register');
        Route::post('/auth/register', 'auth_register')->name('auth.register');
    });
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', function(Request $request){
        Auth::logout();
        $request->session()->regenerate();
        return to_route('login');
    })->name('logout');
    Route::controller(UserController::class)->group(function(){
        Route::get('/', 'pokedex')->name('home');
        Route::get('/catch/{id}', 'catch_pokemon')->name('pokemon.catch');
        Route::get('/free/{id}', 'free_pokemon')->name('pokemon.free');
    });
});