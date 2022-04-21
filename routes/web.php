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


// Accueil 
Route::get('/accueil', 'App\Http\Controllers\VisiteurController@Index');

//Rapport de visite 
Route::get('/rapportdevisite', 'App\Http\Controllers\VisiteurController@RapportFormulaire');
Route::post('/rapportdevisite', 'App\Http\Controllers\VisiteurController@Rapport');

//Médicament
Route::get('/medicament', 'App\Http\Controllers\VisiteurController@Medicament');
Route::get('/medicament/precedent/{id}', 'App\Http\Controllers\VisiteurController@MedicamentPrecedent');
Route::get('/medicament/suivant/{id}', 'App\Http\Controllers\VisiteurController@MedicamentSuivant');

//Praticiens
Route::get('/praticien', 'App\Http\Controllers\VisiteurController@Praticien');
Route::post('/praticien', 'App\Http\Controllers\VisiteurController@PraticienRecherche');
Route::get('/praticien/precedent/{id}', 'App\Http\Controllers\VisiteurController@PraticienPrecedent');
Route::get('/praticien/suivant/{id}', 'App\Http\Controllers\VisiteurController@PraticienSuivant');

//Visiteur
Route::get('/praticien', 'App\Http\Controllers\VisiteurController@Praticien');
Route::post('/praticien', 'App\Http\Controllers\VisiteurController@PraticienRecherche');
Route::get('/praticien/precedent/{id}', 'App\Http\Controllers\VisiteurController@PraticienPrecedent');
Route::get('/praticien/suivant/{id}', 'App\Http\Controllers\VisiteurController@PraticienSuivant');

