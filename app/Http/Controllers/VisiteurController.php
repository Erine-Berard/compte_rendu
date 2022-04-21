<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;

class VisiteurController extends Controller
{
    public function Index(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            return view('accueil', [
                'visiteur'=> $visiteur,
            ]);
        }
        else {
            return redirect('/');
        }     
    }
}
