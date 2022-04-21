<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;
use App\Models\Medicament;
use App\Models\Rapport;
use App\Models\MedicamentRapport;
use App\Models\Rapports;
use App\Models\Famille;


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
}
