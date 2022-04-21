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
        $visiteur = Visiteur::where('login', request('login'))->first();
        
        if ($visiteur == null){
            return view('connexion',[
                'erreur' => "Login ou mot de passe incorecte"
            ]);
        }
        else {
            $date = $visiteur['dateEmbauche'];
            $mp ='';
            $jour= "";
            $mois= "";
            $annee= "";
            for($i = 0; $i < strlen($date); $i++){
                if ($i < 4){
                    $annee= $annee.$visiteur['dateEmbauche'][$i];
                }
                else if ($i > 4 && $i < 7){
                    $mois = $mois.$visiteur['dateEmbauche'][$i];
                }
                else if ($i > 7){
                    $jour = $jour.$visiteur['dateEmbauche'][$i];
                }
            }
            switch ($mois) {
                case 01 : 
                    $mois = 'jan';
                    break;
                case 02 : 
                    $mois = 'feb';
                    break;
                case 03 : 
                    $mois = 'mar';
                    break;
                case 04 : 
                    $mois = 'apr';
                    break;
                case 05 : 
                    $mois = 'may';
                    break;
                case 06 : 
                    $mois = 'jun';
                    break;
                case 07 : 
                    $mois = 'jul';
                    break;
                case 8 : 
                    $mois = 'jul';
                    break;
                case 9 : 
                    $mois = 'sep';
                    break;
                case 10 : 
                    $mois = 'oct';
                    break;
                case 11 : 
                    $mois = 'nov';
                    break;
                case 12 : 
                    $mois = 'dec';
                    break;
            }
            $mp = $jour."-".$mois."-".$annee;

            if ($mp == request('mp')){
                return redirect('/accueil/'.$visiteur['id']);
            }
            else {
                return view('connexion',[
                    'erreur' => "Login ou mot de passe incorecte"
                ]);
            }
        }
    }
}
