@extends('layout.app')
@section('content')
<section class="flex flex-col bg-red-400 p-4">
    <form method="post" class="mx-auto p-4 w-full bg-white max-w-[500px] flex flex-col gap-2 shadow-lg rounded">
        @csrf
        <h3 class="text-red-400 font-medium">Formulaire d'inscription</h3>
        <div class="w-full">
            <label for=""></label>
            <input type="text" name="name" class="w-full border outline-none p-2 my-2 text-sm" placeholder="Entrer un nom valide">
            @error('name')
                <small class="text-red-400">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <label for=""></label>
            <input type="text" name="pseudo" class="w-full border outline-none p-2 my-2 text-sm" placeholder="Entrer un pseudo valide (pour la connexion)">
            @error('pseudo')
                <small class="text-red-400">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <label for=""></label>
            <input type="tel" name="contact" class="w-full border outline-none p-2 my-2 text-sm" placeholder="Entrer un numéro valide (pour la restauration du mdp)">
            @error('contact')
                <small class="text-red-400">{{$message}}</small>
            @enderror
        </div>
        <div class="w-full">
            <label for=""></label>
            <input type="email" name="email" class="w-full border outline-none p-2 my-2 text-sm" placeholder="Entrer un email valide (facultatif) *">
            @error('email')
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
        <div class="w-full">
            <label for=""></label>
            <input type="password" name="password_confirmation" class="w-full border outline-none p-2 my-2 text-sm" placeholder="Confirmez votre mot de passe">
        </div>
        <div class="flex flex-col gap-1">
            <a href="{{route('login')}}" class="text-sm text-blue-300 underline font-medium  w-fit">Se connecter</a>
        </div>
        <button type="submit" class="my-2 p-2 rounded bg-yellow-200 text-white font-medium hover:bg-yellow-300 max-w-fit">S'inscrire</button>
    </form>
</section>
@endsection