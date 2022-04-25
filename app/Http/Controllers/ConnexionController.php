<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;

class ConnexionController extends Controller 
{
    public function Index(){
        return view('connexion',[
            'erreur' => ""
        ]);
    }

    public function Connexion(){
        request()->validate([ // On vérifie les valeurs envoyées 
            'login' =>['required'],
            'mp' => ['required']
        ],[
            'login.required' => "Ce champ est obligatoire",
            'mp.required' => "Ce champ est obligatoire"
        ]);

        $resultat = auth()->attempt([ // On vérifie la connexion grace à des méthodes propres à Laravel 
            'login' =>request('login'),
            'password' => request('mp'),
        ]);

        if ($resultat == false){ // Si la connexion n'est pas bonne on revoie sur la page de connexion avec une erreur
            return back()->withinput()->withErrors([
                'login' => "Login ou mot de passe incorecte"
            ]);
        }
        else { // Sinon on redirige vers la page d'acceuil 
            return redirect('/accueil');
        }
    }
}
