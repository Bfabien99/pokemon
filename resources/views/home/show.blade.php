@extends('layout.app')
@section('content')
<section class="bg-yellow-200">
    @if (count($pokemon) == 0)
        <p>No pokemon available now...</p>
    @else
        <div class="flex flex-wrap justify-center items-center gap-x-3 gap-y-4 p-4">
                <div href="{{route('pokemon.detail', $pokemon['slug'])}}" class="p-2 text-center hover:bg-yellow-300 rounded-sm">
                    <img src="{{$pokemon['image']}}" alt="" width="100">
                    <p class="font-medium">{{$pokemon['name']}}</p>
                </div>
        </div>
    @endif
</section>
<section>

</section>
@endsection