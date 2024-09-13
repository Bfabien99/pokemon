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
        if(Cache::has('pokemon_list')) return Cache::get('pokemon_list');
        #$url = $this->api_url . "pokemon/limit/100";
        $url = $this->api_url . "pokemon";
        $api_call = Http::withoutVerifying()->get($url);
        $status = $api_call->status();
        # si le status n'est pas 200
        if ($status != 200)
            return "can't fetch data from remote : " . $request->getUri();

        # si le status est 200
        $data = $api_call->json(); # on retourne les données sous forme d'objets
        return Cache::remember('pokemon_list', 3600, function () use ($data) {
            return view('home.index', )->with('pokemons', $data)->render();
        });
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
}
