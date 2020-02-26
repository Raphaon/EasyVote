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
	'uses' => 'AdminController@index',
	'as' => "admin.index",
]);
Route::get('/logs-admin', [
	'uses' => 'AdminController@logs',
	'as' => "admin.logs",
]);


// CRUD des régions
Route::group(['prefix' => 'regions'], function(){
	Route::get('liste-des-régions', [
		'uses' => "RegionController@all",
		'as' => "admin.regions.all",
	]);
	Route::get('ajouter-une-région', [
		'uses' => "RegionController@new",
		'as' => "admin.regions.new",
	]);
	Route::post('ajouter-une-région', [
		'uses' => "RegionController@save",
		'as' => "admin.regions.save",
	]);
	Route::get('editer-région/{codeReg}', [
		'uses' => "RegionController@edit",
		'as' => "admin.regions.edit",
	]);
	Route::post('maj-région', [
		'uses' => "RegionController@update",
		'as' => "admin.regions.update",
	]);
	Route::get('supprimer-région/{codeReg}', [
		'uses' => "RegionController@delete",
		'as' => "admin.regions.delete",
	]);
});

// CRUD des départements
Route::group(['prefix' => 'departements'], function(){
	Route::get('liste-des-départements', [
		'uses' => "DepartementController@all",
		'as' => "admin.departements.all",
	]);
	Route::get('ajouter-un-département', [
		'uses' => "DepartementController@new",
		'as' => "admin.departements.new",
	]);
	Route::post('ajouter-un-département', [
		'uses' => "DepartementController@save",
		'as' => "admin.departements.save",
	]);
	Route::get('editer-département/{codeDep}', [
		'uses' => "DepartementController@edit",
		'as' => "admin.departements.edit",
	]);
	Route::post('maj-département', [
		'uses' => "DepartementController@update",
		'as' => "admin.departements.update",
	]);
	Route::get('supprimer-département/{codeDep}', [
		'uses' => "DepartementController@delete",
		'as' => "admin.departements.delete",
	]);
});

// CRUD des communes
Route::group(['prefix' => 'communes'], function(){
	Route::get('liste-des-communes', [
		'uses' => "CommuneController@all",
		'as' => "admin.communes.all",
	]);
	Route::get('ajouter-une-commune', [
		'uses' => "CommuneController@new",
		'as' => "admin.communes.new",
	]);
	Route::post('ajouter-une-commune', [
		'uses' => "CommuneController@save",
		'as' => "admin.communes.save",
	]);
	Route::get('editer-commune/{codeDep}', [
		'uses' => "CommuneController@edit",
		'as' => "admin.communes.edit",
	]);
	Route::post('maj-commune', [
		'uses' => "CommuneController@update",
		'as' => "admin.communes.update",
	]);
	Route::get('supprimer-commune/{codeDep}', [
		'uses' => "CommuneController@delete",
		'as' => "admin.communes.delete",
	]);
});

// CRUD des bureaux_de_vote
Route::group(['prefix' => 'bureau-de-vote'], function(){
	Route::get('liste-des-bureaux-de-vote', [
		'uses' => "BureauDeVoteController@all",
		'as' => "admin.bureau_de_vote.all",
	]);
	Route::get('ajouter-un-bureau-de-vote', [
		'uses' => "BureauDeVoteController@new",
		'as' => "admin.bureau_de_vote.new",
	]);
	Route::post('ajouter-un-bureau-de-vote', [
		'uses' => "BureauDeVoteController@save",
		'as' => "admin.bureau_de_vote.save",
	]);
	Route::get('editer-bureau-de-vote/{id}', [
		'uses' => "BureauDeVoteController@edit",
		'as' => "admin.bureau_de_vote.edit",
	]);
	Route::post('maj-bureau-de-vote', [
		'uses' => "BureauDeVoteController@update",
		'as' => "admin.bureau_de_vote.update",
	]);
	Route::get('supprimer-bureau-de-vote/{id}', [
		'uses' => "BureauDeVoteController@delete",
		'as' => "admin.bureau_de_vote.delete",
	]);
});