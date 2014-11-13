<?php


Route::get('usuarios/create', ['as' => 'crearUsuario', 'uses' => 'userController@create']);
Route::post('usuarios/create', ['as' => 'guardarUsuario', 'uses' => 'userController@store']);
Route::get('usuarios/edit/{id}', ['as' => 'editarUsuario', 'uses' => 'userController@edit']);
Route::patch('usuarios/edit/{id}', ['as' => 'updateUsuario', 'uses' => 'userController@update']);
Route::group(array('before' => 'auth|admin'), function()
{
	Route::get('usuarios', ['as' => 'usuarios', 'uses' => 'userController@index']);
});
