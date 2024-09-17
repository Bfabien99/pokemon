<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    //
    private string $api_url = "https://pokebuildapi.fr/api/v1/";

    public function catch_pokemon(Request $request, string $pokemon_id){
        $url = $this->api_url . "pokemon/$pokemon_id";
        $api_call = Http::withoutVerifying()->get($url);
        $status = $api_call->status();
        # si le status n'est pas 200
        if ($status != 200)
            return "can't fetch data from remote : " . $request->getUri();

        # si le status est 200
        $data = $api_call->json();
        if($data["apiPreEvolution"] != "none") return "can't catch this Pokemon!";
        
        $is_pokedex = Pokedex::where(['pokemon_id' => $data['id'], 'user_id' => auth()->user()->id])->first();
        if($is_pokedex) return "Ce pokemon est déjà dans votre liste";
        Pokedex::create([
            'pokemon_id' => $data['id'],
            'pokemon_name' => $data['slug'],
            'pokemon_image_url' => $data['image'],
            'user_id' => auth()->user()->id
        ]);
        return back()->with('succes', 'Pokemon capturé!');
    }

    public function free_pokemon(Request $request, string $pokemon_id){
        $url = $this->api_url . "pokemon/$pokemon_id";
        $api_call = Http::withoutVerifying()->get($url);
        $status = $api_call->status();
        # si le status n'est pas 200
        if ($status != 200)
            return "can't fetch data from remote : " . $request->getUri();

        # si le status est 200
        $data = $api_call->json();
        
        $is_pokedex = Pokedex::where(['pokemon_id' => $data['id'], 'user_id' => auth()->user()->id])->firstOrFail();
        if(!$is_pokedex) return "Ce pokemon n'est pas dans votre liste";
        $is_pokedex->delete();
        return back()->with('succes', 'Pokemon relaché!');
    }

    public function pokedex(){
        return view('user.pokedex');
    }
}
