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
use App\Models\Secteur;
use App\Models\Labo;



class VisiteurController extends Controller
{
    public function Index(){ 
        if (auth()->check())  {// Vérifie si on est connecté 
            $visiteur = auth()->user();// Récupère le visiteur connecté
            return view('accueil', [
                'visiteur'=> $visiteur,
            ]);
        }
        else {// Sinon on redirige vers la page de connexion
            return redirect('/');
        }     
    }

    public function RapportFormulaire(){
        if (auth()->check())  {
            $visiteur = auth()->user();

            $praticiens = Praticien::all(); // Renvoie tous les praticiens
            $medicaments = Medicament::all(); // Renvoie tous les médicaments 
            

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

    public function RapportVoir(){
        if (auth()->check())  {
            $visiteur = auth()->user();

            $praticiens = Praticien::all(); // Renvoie tous les praticiens
            $rapports = Rapports::all(); // Renvoie tous les rapports
            
            return view('rapportVoir', [
                'visiteur'=> $visiteur,
                'praticiens' => $praticiens,
                'rapports' => $rapports,
            ]);
        }
        else {
            return redirect('/');
        }     
    }

    public function RapportVoirUnit(){
        if (auth()->check())  {
            $visiteur = auth()->user();

            $rapport = Rapports::where('id', request('id'))->first(); // Renvoie le rapport avec l'id demandé 
            $praticien = Praticien::where('id', $rapport['idPraticien'])->first(); // Renvoie le praticien dont l'id est contenue dans le rapport 
            $visiteurRapport = Visiteur::where('id', $rapport['idVisiteur'])->first(); // Renvoie le visiteur dont l'id est contenue dans le rapport 
            $liensMedocs = MedicamentRapport::where('idRapport', $rapport['id'])->get(); // Renvoie tous les liens médicaments-rapports qui ont pour idRapport l'id de notre rapport 
            $medicaments = Medicament::all();// Renvoie tous les médicaments
            $familles = Famille::all();// Renvoie toutes les familles  
            
            
            return view('rapportVoirUnit', [
                'visiteur'=> $visiteur,
                'praticien' => $praticien,
                'rapport' => $rapport,
                'liensMedocs' => $liensMedocs,
                'medicaments'=>  $medicaments,
                'visiteurRapport' => $visiteurRapport,
                'familles' => $familles,
            ]);
        }
        else {
            return redirect('/');
        }     
    }

    public function Rapport(){
        if (auth()->check())  { // Vérifie si on est connecté 
            $visiteur = auth()->user(); // Récupère le visiteur connecté

            $desIndex = array_keys(request()->all()); // Récupère tous les index des champs envoyés par notre formulaire 
            $i=0;

            $rapport = Rapports::create([ // Crée un rapport
                'idPraticien' => request('praticien'),
                'dateRapport' => request('dateRapport'),
                'motif'=>request('motif'),
                'idVisiteur'=> $visiteur['id'],
                'bilan'=>request('bilan'),
            ]);

            foreach($desIndex as $index){ // Parcoure les indexes 
                if (stristr($index, 'medicament')){ // Si medicament est contenue dans l'indexe
                    $i++;
                    $medicamentRapport = MedicamentRapport::create([ // On crée une liaison entre le rapport et le médicament
                        'idRapport'=>$rapport['id'],
                        'idMedicament'=>request('medicament'.$i),
                        'quantite'=>request('quantite'.$i),
                    ]);
                }
            }
            return redirect('/rapportdevisite/voir');
        }
        else { // Sinon on redirige vers la page de connexion
            return redirect('/');
        }
    }

    public function Medicament(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $medicaments = Medicament::all(); // Renvoie tous les médicaments
            return view('medicament', [
                'visiteur'=> $visiteur,
                'medicament'=>$medicaments[0],
                'famille' => Famille::where('id', $medicaments[0]['famille'])->first(), //Renvoie toutes les familles qui ont pour id l'id de la famille contenue dans  médicaments[0]
            ]);
        }
        else {
            return redirect('/');
        }     
    }

    public function MedicamentSuivant(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $medicament = Medicament::where('id', request('id')+1)->first(); // Renvoie le medicament avec l'id supérieur
            if ($medicament != null){
                return view('medicament', [
                    'visiteur'=> $visiteur,
                    'medicament'=>$medicament,
                    'famille' => Famille::where('id', $medicament['famille'])->first(), // Renvoie sa famille
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
            $medicament = Medicament::where('id', request('id')-1)->first(); // Renvoie le medicament avec l'id d'en dessous
            if ($medicament != null){
                return view('medicament', [
                    'visiteur'=> $visiteur,
                    'medicament'=>$medicament,
                    'famille' => Famille::where('id', $medicament['famille'])->first(), //Renvoie sa famille
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
            $praticiens = Praticien::all(); // Renvoie tous les praticiens
            return view('praticien', [
                'praticiens'=>$praticiens,
                'visiteur'=> $visiteur,
                'praticien'=>$praticiens[0],
                'lieu' => LieuxExercice::where('id', $praticiens[0]['lieu'])->first(), //Renvoie sa famille
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
            $praticien = Praticien::where('id', request('praticien'))->first(); // Renvoie le praticien de la recherche 
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

    public function Visiteur(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $visiteurs = Visiteur::all();
            return view('visiteur', [
                'visiteurs'=>$visiteurs,
                'visiteur'=> $visiteur,
                'visiteurSelect' => $visiteur,
                'secteur' => Secteur::where('id', $visiteur['IDsecteur'])->first(),
                'secteurs' => Secteur::all(),
                'labos' => Labo::all(),
                'labo' => Labo::where('id', $visiteur['IDlieu'])->first(),
            ]);
        }
        else {
            return redirect('/');
        }     
    }

    public function VisiteurPost(){
        if (auth()->check())  {
            $visiteur = auth()->user();
            $visiteurs = Visiteur::all(); // Renvoie tous les visiteurs 

            $visiteurModif = Visiteur::where('id', request('id'))->first(); //Renvoie le visiteur sélectioné 
            $visiteurModif->update([ // Modifie le visiteur
                'nom' => request('nom'),
                'prenom'=>request('prenom'),
                'adresse'=>request('adresse'),
                'cp'=>request('cp'),
                'ville'=>request('ville'),
                'IDsecteur'=>request('secteur'),
                'IDlabo'=>request('labo'),
            ]);
            if (request('btn') == 'Recherche'){ // Si c'est le bouton recherche qui a été cliqué 
                $visiteurSelect = Visiteur::where('id', request('visiteur'))->first();
                if($visiteurSelect != null){
                    return view('visiteur', [
                        'visiteurs'=>$visiteurs,
                        'visiteur'=> $visiteur,
                        'visiteurSelect' => $visiteurSelect,
                        'secteur' => Secteur::where('id', $visiteur['IDsecteur'])->first(),
                        'secteurs' => Secteur::all(),
                        'labos' => Labo::all(),
                        'labo' => Labo::where('id', $visiteur['IDlieu'])->first(),
                    ]);
                }
                else {
                    return back();
                }
            }
            else if(request('btn') == 'Precedent'){// Si c'est le bouton precedent qui a été cliqué 
                $visiteurSelect = Visiteur::where('id', request('id')-1)->first();
                if($visiteurSelect != null){
                    return view('visiteur', [
                        'visiteurs'=>$visiteurs,
                        'visiteur'=> $visiteur,
                        'visiteurSelect' => $visiteurSelect,
                        'secteur' => Secteur::where('id', $visiteur['IDsecteur'])->first(),
                        'secteurs' => Secteur::all(),
                        'labos' => Labo::all(),
                        'labo' => Labo::where('id', $visiteur['IDlieu'])->first(),
                    ]);
                }
                else {
                    return back();
                }
            }
            else if(request('btn') == 'Suivant'){// Si c'est le bouton suivant qui a été cliqué 
                $visiteurSelect = Visiteur::where('id', request('id')+1)->first();
                if($visiteurSelect != null){
                    return view('visiteur', [
                        'visiteurs'=>$visiteurs,
                        'visiteur'=> $visiteur,
                        'visiteurSelect' => $visiteurSelect,
                        'secteur' => Secteur::where('id', $visiteur['IDsecteur'])->first(),
                        'secteurs' => Secteur::all(),
                        'labos' => Labo::all(),
                        'labo' => Labo::where('id', $visiteur['IDlieu'])->first(),
                    ]);
                }
                else {
                    return back();
                }
            }
        }
        else {
            return redirect('/');
        }     
    }

    public function Deconexion(){
        if (auth()->check())  {
            auth()->logout(); // on déconnecte l'utilisateur 
            return redirect('/');
        }
        else {
            return redirect('/');
        }     
    }
}
