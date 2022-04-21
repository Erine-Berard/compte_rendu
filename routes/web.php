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
Route::get('/accueil/{id}', 'App\Http\Controllers\VisiteurController@Index');
