@extends('layout.app')
@section('content')
<section class="flex flex-col bg-blue-400 p-4">
    <form method="post" class="mx-auto p-4 w-full bg-white max-w-[500px] flex flex-col gap-2 shadow-lg rounded">
        @csrf
        <h3 class="text-blue-400 font-medium">Formulaire de connexion</h3>
        @if (session()->has('erreur'))
            <small class="text-red-400">{{session('erreur')}}</small>
        @endif
        @if (session()->has(key: 'succes'))
            <small class="text-green-400">{{session('succes')}}</small>
        @endif
        <div class="w-full">
            <label for=""></label>
            <input type="text" name="pseudo" class="w-full border outline-none p-2 my-2 text-sm" placeholder="Entrer un pseudo valide (pour la connexion)">
            @error('pseudo')
                <small class="text-red-400">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <label for=""></label>
            <input type="password" name="password" class="w-full border outline-none p-2 my-2 text-sm" placeholder="Créer votre mot de passe">
            @error('password')
                <small class="text-red-400">{{$message}}</small>
            @enderror
        </div>
        <div class="flex flex-col gap-1 w-fit">
            <a href="{{route('register')}}" class="text-sm text-red-300 underline font-medium  w-fit">S'inscrire</a>
            <a href="{{route('login')}}" class="text-sm text-blue-300 underline  w-fit">Mot de passe oublié?</a>
        </div>
        <button type="submit" class="my-2 p-2 rounded bg-yellow-200 text-white font-medium hover:bg-yellow-300 max-w-fit">Se connecter</button>
    </form>
</section>
@endsection