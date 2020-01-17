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