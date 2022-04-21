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
        request()->validate([
            'login' =>['required'],
            'mp' => ['required']
        ],[
            'login.required' => "Ce champ est obligatoire",
            'mp.required' => "Ce champ est obligatoire"
        ]);

        $resultat = auth()->attempt([
            'login' =>request('login'),
            'password' => request('mp'),
        ]);

        if ($resultat == false){
            return back()->withinput()->withErrors([
                'login' => "Login ou mot de passe incorecte"
            ]);
        }
        else {
            return redirect('/accueil');
        }
    }
}
