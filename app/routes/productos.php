<?php


Route::get('productos', ['as' => 'productos', 'uses' => 'ProductoController@index']);
Route::get('productos/create', ['as' => 'crearProducto', 'uses' => 'ProductoController@create']);
Route::post('productos/create', ['as' => 'guardarProducto', 'uses' => 'ProductoController@store']);
Route::get('productos/edit/{id}', ['as' => 'editarProducto', 'uses' => 'ProductoController@edit']);
Route::patch('productos/edit/{id}', ['as' => 'updateProducto', 'uses' => 'ProductoController@update']);
Route::delete('productos/delete/{id}', ['as' => 'deleteProducto', 'uses' => 'ProductoController@destroy']);