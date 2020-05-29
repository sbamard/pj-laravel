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

/*
 * Page d'accueil
 */
Route::get('/','CvthequeController@index')->name('accueil');

/*
 * Route pour la gestion des compétences
 */
Route::resource('competence','CompetenceController');

/*
 * Route pour la gestion des métiers
 * Quand on ajoute une route, on la met avant la route, l'ordre à de l'importance
 */
Route::get('metier/{metier}/suppression','MetierController@showDestroy')->name('metier.showDestroy');
Route::resource('metier','MetierController');

/*
 * Route pour la gestion des professionnels
 */
Route::get('metier/{slug}/professionnel', 'ProfessionnelController@index')->name('professionnel.metier');
Route::resource('professionnel', 'ProfessionnelController');
