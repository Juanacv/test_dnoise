<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::resource('empresas', 'EnterprisesController');


Route::get('empresas/{id}/showdestroy', ['as' => 'empresas.showdestroy', 'uses'=>'EnterprisesController@showdestroy']);

Route::resource('relaciones', 'RelationsController');

Route::get('relaciones/{id}/crearrelacion', ['as' => 'relaciones.createrelationship', 'uses'=>'RelationsController@createrelationship']);

Route::get('relaciones/indexrelaciones/{id}/{filtro}/{primeros}', ['as' => 'relaciones.indexrelationship', 'uses'=>'RelationsController@indexrelationship']);

Route::get('relaciones/borrarrelacion/{id}/{cid}/{pid}/{filtro}/{primeros}', ['as' => 'relaciones.destroyrelation', 'uses'=>'RelationsController@destroyrelation']);