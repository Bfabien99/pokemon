@extends('layout.app')
@section('content')
<section class="flex flex-col">
    @if (count($types) == 0)
        <p>No type available now...</p>
    @else
        <div class="flex flex-wrap justify-center items-center gap-x-6 gap-y-6 p-4 m-auto">
            @foreach ($types as $type)
                <a href="{{route('pokemon.type.detail', $type['name'])}}" class="p-4 text-center hover:bg-gray-100 rounded-lg" id="{{$type['name']}}">
                    <img src="{{$type['image']}}" alt="" width="100">
                    <p class="font-medium">{{$type['name']}}</p>
                </a>
            @endforeach
        </div>
    @endif
</section>
@endsection