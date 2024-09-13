@extends('layout.app')
@section('content')
<section class="bg-yellow-200 max-w-screen-md mx-auto shadow-xl rounded-lg">
    @if (count($pokemon) == 0)
        <p>No pokemon available now...</p>
    @else
        <div class="flex flex-col justify-center items-center p-4">
            <a href="{{route('pokemon.list')}}#{{$pokemon['slug']}}" class="border border-yellow-100 p-2 rounded-sm hover:bg-yellow-300 hover:border-yellow-300">Back</a>
            <div href="{{route('pokemon.detail', $pokemon['slug'])}}" class="p-2 text-center rounded-sm">
                <div class="flex flex-wrap mx-auto items-center gap-2 justify-center">
                    @if (is_array($pokemon['apiPreEvolution']) && count($pokemon['apiPreEvolution']))
                        <a class="border border-blue-400 p-1" href="{{route('pokemon.detail', $pokemon["apiPreEvolution"]['name'])}}">Regresser</a>
                    @endif
                    <img src="{{$pokemon['image']}}" alt="" width="250">
                    @if (is_array($pokemon['apiEvolutions']) && count($pokemon['apiEvolutions']))
                        <a class="border border-green-400 p-1" href="{{route('pokemon.detail', $pokemon['apiEvolutions'][0]["name"])}}">Evoluer</a>
                    @endif
                </div>
                <p class="font-medium text-4xl">{{$pokemon['name']}}</p>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="flex flex-col p-2 text-center">
                    <p class="flex items-center justify-between text-lg"><span
                            class="font-medium text-sm">HP:</span>{{$pokemon['stats']['HP']}}</p>
                    <div class="bg-gray-600 h-2.5 rounded-full" style="width: 200px">
                        <div class="bg-blue-600 h-2.5 rounded-full progress-bar" style="width: {{$pokemon['stats']['HP']}}px"></div>
                    </div>
                </div>
                <div class="flex flex-col p-2 text-center">
                    <p class="flex items-center justify-between text-lg"><span
                            class="font-medium text-sm">ATT:</span>{{$pokemon['stats']['attack']}}</p>
                    <div class="bg-gray-600 h-2.5 rounded-full" style="width: 200px">
                        <div class="bg-red-600 h-2.5 rounded-full progress-bar" style="width: {{$pokemon['stats']['attack']}}px"></div>
                    </div>
                </div>
                <div class="flex flex-col p-2 text-center">
                    <p class="flex items-center justify-between text-lg"><span
                            class="font-medium text-sm">DEF:</span>{{$pokemon['stats']['defense']}}</p>
                    <div class="bg-gray-600 h-2.5 rounded-full" style="width: 200px">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: {{$pokemon['stats']['defense']}}px"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="flex flex-col p-2 text-center">
                    <p class="flex items-center justify-between text-lg"><span
                            class="font-medium text-sm">VIT:</span>{{$pokemon['stats']['speed']}}</p>
                    <div class="bg-gray-600 h-2.5 rounded-full" style="width: 200px">
                        <div class="bg-blue-400 h-2.5 rounded-full" style="width: {{$pokemon['stats']['speed']}}px"></div>
                    </div>
                </div>
                <div class="flex flex-col p-2 text-center">
                    <p class="flex items-center justify-between text-lg"><span class="font-medium text-sm">SP
                            ATT:</span>{{$pokemon['stats']['special_attack']}}</p>
                    <div class="bg-gray-600 h-2.5 rounded-full" style="width: 200px">
                        <div class="bg-red-400 h-2.5 rounded-full" style="width: {{$pokemon['stats']['special_attack']}}px">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col p-2 text-center">
                    <p class="flex items-center justify-between text-lg"><span class="font-medium text-sm">SP
                            DEF:</span>{{$pokemon['stats']['special_defense']}}</p>
                    <div class="bg-gray-600 h-2.5 rounded-full" style="width: 200px">
                        <div class="bg-green-400 h-2.5 rounded-full"
                            style="width: {{$pokemon['stats']['special_defense']}}px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[300px] flex flex-wrap mx-auto justify-around items-center p-4 gap-x-4 gap-y-4">
            @if ($pokemon['apiTypes'])
                @foreach ($pokemon['apiTypes'] as $type)
                    <div class="text-center">
                        <img src="{{$type['image']}}" alt="" width="70">
                        <a href="" class="hover:text-blue-400 font-medium">{{$type['name']}}</a>
                    </div>
                @endforeach
            @endif
        </div>
    @endif
</section>
@endsection