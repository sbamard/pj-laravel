<?php

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

//Route::get('/', function () {
//    return view('cvtheque');
//});

//Page d'accueil
Route::get('/','CvthequeController@index');

//Route pour la gestion des compétences
Route::resource('competence','CompetenceController');

//Route pour la gestion des métiers
Route::resource('metier','MetierController');
