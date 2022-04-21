<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;

class VisiteurController extends Controller
{
    public function Index(){
        $visiteur = Visiteur::where('id', request('id'))->first();
        return view('accueil', [
            'visiteur'=> $visiteur,
        ]);
    }
}
