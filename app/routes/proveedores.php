<?php


Route::get('proveedores', ['as' => 'proveedores', 'uses' => 'proveedoresController@index']);
Route::get('proveedores/create', ['as' => 'crearProveedor', 'uses' => 'proveedoresController@create']);
Route::post('proveedores/create', ['as' => 'guardarProveedor', 'uses' => 'proveedoresController@store']);
Route::get('proveedores/edit/{id}', ['as' => 'editarProveedor', 'uses' => 'proveedoresController@edit']);
Route::patch('proveedores/edit/{id}', ['as' => 'updateProveedor', 'uses' => 'proveedoresController@update']);