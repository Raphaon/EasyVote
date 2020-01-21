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
Route::get('/logs', [
	'uses' => 'DashboardController@logs',
	'as' => "dashboard.logs",
]);
Route::get('/profile', [
	'uses' => 'DashboardController@profile',
	'as' => "dashboard.profile",
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
});

Route::post('maj-statut-process', [
	'uses' => "InscriptionsController@updateStatutProcess",
	'as' => "dashboard.inscription.update_statut_process",
]);
Route::post('maj-statut-elements', [
	'uses' => "InscriptionsController@updateStatutElements",
	'as' => "dashboard.inscription.update_statut_elements",
]);