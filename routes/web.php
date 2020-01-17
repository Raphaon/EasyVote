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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);  // Je n'ai pas besoin de la route register. La création d'un admin se fera par un autre admin dans le dashboard directement

Route::get('/home', 'HomeController@index')->name('home');

Route::get(
    '/lang/{lang}',
    [
        'before' => 'csrf',
        'uses' => "HomeController@change_language",
        'as' => 'lang'
    ]
);