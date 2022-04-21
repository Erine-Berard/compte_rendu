<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;
use App\Models\Medicament;
use App\Models\Rapport;
use App\Models\MedicamentRapport;
use App\Models\Rapports;
use App\Models\Famille;
use App\Models\Praticien;
use App\Models\LieuxExercice;



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

    public function RapportFormulaire(){
        if (auth()->check())  {
            $visiteur = auth()->user();

            $praticiens = Visiteur::where('statut', 'PRA')->get();
            $medicaments = Medicament::all();
            

            return view('rapport', [
                'visiteur'=> $visiteur,
                'praticiens' => $praticiens,
                'medicaments' => $medicaments,
            ]);
        }
        else {
            return redirect('/');
        }     
    }

    public function Rapport(){
        if (auth()->check())  {
            $visiteur = auth()->user();

            $desIndex = array_keys(request()->all());
            $i=0;

            $rapport = Rapports::create([
                'idPraticien' => request('praticien'),
                'dateRapport' => request('dateRapport'),
                'motif'=>request('motif'),
                'idVisiteur'=> $visiteur['id'],
                'bilan'=>request('bilan'),
            ]);

            foreach($desIndex as $index){
                if (stristr($index, 'medicament')){
                    $i++;
                    $medicamentRapport = MedicamentRapport::create([
                        'idRapport'=>$rapport['id'],
                        'idMedicament'=>request('medicament'.$i),
                        'quantite'=>request('quantite'.$i),
                    ]);
                }
            }
            return redirect('/accueil');
        }
        else {
            return redirect('/');
        }
    }

    public function Medicament(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $medicaments = Medicament::all();
            return view('medicament', [
                'visiteur'=> $visiteur,
                'medicament'=>$medicaments[0],
                'famille' => Famille::where('id', $medicaments[0]['famille'])->first(),
            ]);
        }
        else {
            return redirect('/');
        }     
    }

    public function MedicamentSuivant(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $medicament = Medicament::where('id', request('id')+1)->first();
            if ($medicament != null){
                return view('medicament', [
                    'visiteur'=> $visiteur,
                    'medicament'=>$medicament,
                    'famille' => Famille::where('id', $medicament['famille'])->first(),
                ]);
            }
            else {
                return back();
            }
        }
        else {
            return redirect('/');
        }     
    }

    public function MedicamentPrecedent(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $medicament = Medicament::where('id', request('id')-1)->first();
            if ($medicament != null){
                return view('medicament', [
                    'visiteur'=> $visiteur,
                    'medicament'=>$medicament,
                    'famille' => Famille::where('id', $medicament['famille'])->first(),
                ]);
            }
            else {
                return back();
            }
        }
        else {
            return redirect('/');
        }     
    }

    public function Praticien(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $praticiens = Praticien::all();
            return view('praticien', [
                'praticiens'=>$praticiens,
                'visiteur'=> $visiteur,
                'praticien'=>$praticiens[0],
                'lieu' => LieuxExercice::where('id', $praticiens[0]['lieu'])->first(),
            ]);
        }
        else {
            return redirect('/');
        }     
    }

    public function PraticienRecherche(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $praticiens = Praticien::all();
            $praticien = Praticien::where('id', request('praticien'))->first();
            return view('praticien', [
                'praticiens'=>$praticiens,
                'visiteur'=> $visiteur,
                'praticien'=>$praticien,
                'lieu' => LieuxExercice::where('id', $praticien['lieu'])->first(),
            ]);
        }
        else {
            return redirect('/');
        }     
    }

    public function praticienSuivant(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $praticien = Praticien::where('id', request('id')+1)->first();
            if ($praticien != null){
                return view('praticien', [
                    'praticiens'=>Praticien::all(),
                    'visiteur'=> $visiteur,
                    'praticien'=>$praticien,
                    'lieu' => LieuxExercice::where('id', $praticien['lieu'])->first(),
                ]);
            }
            else {
                return back();
            }
        }
        else {
            return redirect('/');
        }     
    }

    public function praticienPrecedent(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $praticien = Praticien::where('id', request('id')-1)->first();
            if ($praticien != null){
                return view('praticien', [
                    'praticiens'=>Praticien::all(),
                    'visiteur'=> $visiteur,
                    'praticien'=>$praticien,
                    'lieu' => LieuxExercice::where('id', $praticien['lieu'])->first(),
                ]);
            }
            else {
                return back();
            }
        }
        else {
            return redirect('/');
        }     
    }
}
