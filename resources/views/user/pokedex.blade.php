@extends('layout.app')
@section('content')
<section class="flex flex-col bg-red-200">
    <h2 class="text-center">Mon Pokedex</h2>
    @if (count(auth()->user()->pokemons) == 0)
        <p class='text-center font-medium text-sm text-gray-400'>Aucun pokémon...</p>
    @else
        <div class="flex flex-wrap justify-center items-center gap-x-3 gap-y-4 p-4">
            @foreach (auth()->user()->pokemons as $pokemon)
                <a href="{{route('pokemon.detail', $pokemon['pokemon_name'])}}" class="p-2 text-center hover:bg-red-300 rounded-sm" id="{{$pokemon['pokemon_name']}}">
                    <img src="{{$pokemon['pokemon_image_url']}}" alt="" width="100">
                    <p class="font-medium">{{$pokemon['pokemon_name']}}</p>
                </a>
            @endforeach
        </div>
    @endif
</section>
@endsection