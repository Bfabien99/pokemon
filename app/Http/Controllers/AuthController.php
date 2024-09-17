<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function auth_login(Request $request){
        $validate = $request->validate([
            'pseudo' => 'required',
            'password' => 'required'
        ]);

        # Connexion de l'utilisateur
        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }
        return back()->with('erreur', 'Données de connexion incorrectes');
    }

    public function register(){
        return view('auth.register');
    }

    public function auth_register(Request $request){
        $validate = $request->validate([
            'name' => 'required|min:4|max:50',
            'pseudo' => 'required|min:4|max:50|unique:users,pseudo',
            'email' => 'nullable|email|unique:users,email',
            'contact' => 'required|min:10|max:50|unique:users,contact',
            'password' => 'required|min:6|confirmed'
        ]);

        # Création de l'utilisateur
        User::create($validate);

        # Connexion de l'utilisateur
        return to_route( 'login')->with('succes', 'Merci de nous rejoindre!');
    }
}
