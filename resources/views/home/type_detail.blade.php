@extends('layout.app')
@section('content')
<section class="flex flex-col bg-yellow-200">
    @if (count($pokemons) == 0)
        <p class='text-center font-medium text-sm text-gray-400'>Aucun pokémon...</p>
    @else
        <h3 class="mx-auto my-4 border border-yellow-300 p-1 w-fit">Pokémon de type <span class="font-medium">{{$type}}</span></h3>
        <div class="flex flex-wrap justify-center items-center gap-x-3 gap-y-4 p-4">
            @foreach ($pokemons as $pokemon)
                @if ($pokemon['apiPreEvolution'] == "none")
                <a href="{{route('pokemon.detail', $pokemon['slug'])}}" class="p-2 text-center hover:bg-yellow-300 rounded-sm" id="{{$pokemon['slug']}}">
                    <img src="{{$pokemon['image']}}" alt="" width="100">
                    <p class="font-medium">{{$pokemon['name']}}</p>
                </a>
                @endif
            @endforeach
        </div>
    @endif
</section>
@endsection