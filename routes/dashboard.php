<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Toutes les routes de mon côté admin se trouvent ici ..
| Le prefixe, ainsi que le middleware employé (auth) sont déjà définis dans le RouteServiceProvider
|
*/

Route::get('/', [
	'uses' => 'DashboardController@index',
	'as' => "dashboard.index",
]);
Route::get('/profile', [
	'uses' => 'DashboardController@profile',
	'as' => "dashboard.profile",
]);
Route::get('/cartes-de-vote-disponible', [
	'uses' => 'InscriptionsController@show_ava_cdv',
	'as' => "dashboard.inscriptions.all_cdv",
]);
Route::get('traitement-electeurs/{id}', [
	'uses' => "InscriptionsController@traitement_el",
	'as' => "dashboard.inscriptions.traitement_el"
]);
Route::post('changer-statut-carte-de-vote', [
	'uses' => "InscriptionsController@update_statutCarte",
	'as' => "dashboard.inscription.update_statutCarte"
]);
Route::post('mise-à-jour-profile', [
	'uses' => "DashboardController@update_profile",
	'as' => "dashboard.update_profile"
]);
Route::post('mise-à-jour-photo-de-profile', [
	'uses' => "DashboardController@update_profile_thhumb",
	'as' => "dashboard.update_profileThumb"
]);


// Groupe de routes pour la gestion des inscriptions
Route::group(['prefix'=>'inscriptions'], function (){
	Route::get('inscriptions-non-traitées', [
		'uses' => "InscriptionsController@waiting",
		'as' => "dashboard.inscriptions.waiting"
	]);
	Route::get('inscriptions-rejetées', [
		'uses' => "InscriptionsController@rejected",
		'as' => "dashboard.inscriptions.rejected"
	]);
	Route::get('inscriptions-valides', [
		'uses' => "InscriptionsController@valide",
		'as' => "dashboard.inscriptions.valide"
	]);
	Route::get('traitement-inscriptions/{id}', [
		'uses' => "InscriptionsController@traitement_insc",
		'as' => "dashboard.inscriptions.traitement_insc"
	]);

	// On ajoute une route POST pour chacun afin d'envoyer les données pour les tri et filtre
	Route::post('inscriptions-non-traitées', [
		'uses' => "InscriptionsController@waiting",
		'as' => "dashboard.inscriptions.waiting"
	]);
	Route::post('inscriptions-rejetées', [
		'uses' => "InscriptionsController@rejected",
		'as' => "dashboard.inscriptions.rejected"
	]);
	Route::post('inscriptions-valides', [
		'uses' => "InscriptionsController@valide",
		'as' => "dashboard.inscriptions.valide"
	]);
});

Route::post('maj-statut-process', [
	'uses' => "InscriptionsController@updateStatutProcess",
	'as' => "dashboard.inscription.update_statut_process",
]);
Route::post('maj-statut-elements', [
	'uses' => "InscriptionsController@updateStatutElements",
	'as' => "dashboard.inscription.update_statut_elements",
]);
Route::post('load_values', "AjaxController@loadValues"); // chager les régions & departements & communes & bureaux de vote en Ajax
Route::post('ajouter-matricule-electeur', [
	'uses' => "InscriptionsController@add_carte_electeur",
	'as' => "dashboard.inscription.add_carte_electeur"
]);

Route::group(['prefix' => 'gestionnaires'], function(){
	Route::get('all', [
		'uses' => 'UsersController@all_dashboard',
		'as' => 'dashboard.gestionnaires.all',
	]);
	Route::get('nouveau-gestionnaire', [
		'uses' => 'UsersController@new_dashboard',
		'as' => 'dashboard.gestionnaires.new',
	]);

	Route::post('nouveau-gestionnaire', [
		'uses' => 'UsersController@save_dashboard',
		'as' => 'dashboard.gestionnaires.save',
	]);
});

Route::post('load-image', "AjaxController@loadImage"); // chager les régions & departements & communes & bureaux de vote en Ajax