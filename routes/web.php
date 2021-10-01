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
//
Route::get('/', function () {
    return view('connexionPage');
});

Route::post('/VerifConnexion', 'ControllerConnexion@verifConnexion')->name('VerifConnexion');

// Routes des parcours
Route::get('/PageRouteCreation', 'ControllerRoutes@returnPage')->name('PageRouteCreation');
Route::post('/RouteCreation', 'ControllerRoutes@createRoute')->name('RouteCreation');
Route::get('/deleteRoute/{id}', 'ControllerRoutes@deleteRoute')->name('deleteRoute');

// Routes des étapes
Route::get('/stepPage/{id}', 'ControllerSteps@stepCreationByRoute')->name('stepPage');
Route::post('/stepCreation/{id}', 'ControllerSteps@stepCreation')->name('stepCreation');
Route::post('/showStep/{id}', 'ControllerSteps@showStep')->name('showStep');
Route::get('/deleteStep/{id}/{idStep}', 'ControllerSteps@deleteStep')->name('deleteStep');
Route::get('/itinerary/{id}', 'ControllerItinerary@returnPage')->name('itinerary');

// Routes des évenements
Route::post('/EventCreation/{id}', 'ControllerEvent@EventCreation')->name('EventCreation');



// Routes des Partenaires
Route::post('/addPartenaire/{id}', 'ControllerPartenaire@addPartenaire')->name('addPartenaire');
Route::get('/showPartenaire/{id}', 'ControllerPartenaire@showPartenaire')->name('showPartenaire');



// Routes des équipes
Route::get('/pageTeamCreation', 'ControllerTeams@returnPage')->name('pageTeamCreation');
Route::post('/teamCreation', 'ControllerTeams@createTeam')->name('teamCreation');
Route::get('/showTeams', 'ControllerTeams@showTeams')->name('showTeams');
Route::get('/selectedTeam', 'ControllerTeams@selectedTeam')->name('selectedTeam');

// Routes des joueurs
Route::post('/playerCreation', 'ControllerTeams@createPlayer')->name('playerCreation');
Route::get('/showPlayers', 'ControllerTeams@addPlayersInTeam')->name('addPlayersInTeam');

// Routes des jeux
Route::get('/PageGameCreation', 'ControllerGames@returnPage')->name('PageGameCreation');
Route::post('/gameCreation', 'ControllerGames@createGame')->name('gameCreation');
