<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PokedexController extends Controller
{
    private string $api_url = "https://pokebuildapi.fr/api/v1/";

    public function list(Request $request)
    {
        #Cache::delete('pokemon_list');
        if(Cache::has('pokemon_list')) return view('home.pokemon', ['pokemons' => Cache::get('pokemon_list')]);
        #$url = $this->api_url . "pokemon/limit/20";
        $url = $this->api_url . "pokemon";
        $api_call = Http::withoutVerifying()->get($url);
        $status = $api_call->status();
        # si le status n'est pas 200
        if ($status != 200)
            return "can't fetch data from remote : " . $request->getUri();
 
        # si le status est 200
        $data = $api_call->json(); # on retourne les données sous forme d'objets
        Cache::put('pokemon_list', $data, 300);
        return view('home.pokemon', ['pokemons' => $data]);
    }

    public function show(Request $request, string $pokemon_name)
    {
        $url = $this->api_url . "pokemon/$pokemon_name";
        $api_call = Http::withoutVerifying()->get($url);
        $status = $api_call->status();
        # si le status n'est pas 200
        if ($status != 200)
            return "can't fetch data from remote : " . $request->getUri();

        # si le status est 200
        $data = $api_call->json(); # on retourne les données sous forme d'objets
        return view('home.show', ['pokemon' => $data]);
    }

    public function show_by_id(Request $request, string $pokemon_id)
    {
        $url = $this->api_url . "pokemon/$pokemon_id";
        $api_call = Http::withoutVerifying()->get($url);
        $status = $api_call->status();
        # si le status n'est pas 200
        if ($status != 200)
            return "can't fetch data from remote : " . $request->getUri();

        # si le status est 200
        $data = $api_call->json(); # on retourne les données sous forme d'objets
        return view('home.show', ['pokemon' => $data]);
    }


    public function pokemon_types(Request $request)
    {
        #Cache::delete('pokemon_types');
        if(Cache::has('pokemon_types')){
            return view('home.type', ['types' => Cache::get('pokemon_types', [])]);
        }
        $url = $this->api_url . "types";
        $api_call = Http::withoutVerifying()->get($url);
        $status = $api_call->status();
        # si le status n'est pas 200
        if ($status != 200)
            return "can't fetch data from remote : " . $request->getUri();

        # si le status est 200
        $data = $api_call->json(); # on retourne les données sous forme d'objets
        Cache::put('pokemon_types', $data, 300);
        return view('home.type', ['types' => $data]);
    }

    public function pokemon_type_detail(Request $request, string $type)
    {
        if(Cache::has("pokemon_type_$type")){
            return view('home.type_detail', ['pokemons' => Cache::get("pokemon_type_$type", []), 'type' => $type]);
        }
        $url = $this->api_url . "pokemon/type/$type";
        $api_call = Http::withoutVerifying()->get($url);
        $status = $api_call->status();
        # si le status n'est pas 200
        if ($status != 200)
            return "can't fetch data from remote : " . $request->getUri();

        # si le status est 200
        $data = $api_call->json(); # on retourne les données sous forme d'objets
        Cache::put("pokemon_type_$type", $data, 300);
        return view('home.type_detail', ['pokemons' => $data, 'type' => $type]);
    }
}
