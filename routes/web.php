<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Connexion
Route::get('/', 'App\Http\Controllers\ConnexionController@Index');
Route::post('/', 'App\Http\Controllers\ConnexionController@Connexion');

//Deconexion
Route::get('/deconexion', 'App\Http\Controllers\VisiteurController@Deconexion');

// Accueil 
Route::get('/accueil', 'App\Http\Controllers\VisiteurController@Index');

//Rapport de visite 
Route::get('/rapportdevisite', 'App\Http\Controllers\VisiteurController@RapportFormulaire');
Route::post('/rapportdevisite', 'App\Http\Controllers\VisiteurController@Rapport'); // Pour la création d'un rapport

Route::get('/rapportdevisite/voir', 'App\Http\Controllers\VisiteurController@RapportVoir'); // Pour voir tous les rapports
Route::get('/rapportdevisite/voir/{id}', 'App\Http\Controllers\VisiteurController@RapportVoirUnit'); // Pour voir un rapport


//Médicament
Route::get('/medicament', 'App\Http\Controllers\VisiteurController@Medicament');
Route::get('/medicament/precedent/{id}', 'App\Http\Controllers\VisiteurController@MedicamentPrecedent');
Route::get('/medicament/suivant/{id}', 'App\Http\Controllers\VisiteurController@MedicamentSuivant');

//Praticiens
Route::get('/praticien', 'App\Http\Controllers\VisiteurController@Praticien');
Route::post('/praticien', 'App\Http\Controllers\VisiteurController@PraticienRecherche'); // Pour la recherche 
Route::get('/praticien/precedent/{id}', 'App\Http\Controllers\VisiteurController@PraticienPrecedent');
Route::get('/praticien/suivant/{id}', 'App\Http\Controllers\VisiteurController@PraticienSuivant');

//Visiteur
Route::get('/visiteur', 'App\Http\Controllers\VisiteurController@Visiteur');
Route::post('/visiteur', 'App\Http\Controllers\VisiteurController@VisiteurPost'); // À partir du moment où on clique sur un bouton 


