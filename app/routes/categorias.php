<?php
	Route::get('categorias',                    ['as' => 'categorias', 			'uses' => 'categoryController@index']);
	Route::get('categorias/crear',         		['as' => 'crearCategoria', 	'uses' => 'categoryController@crear']);
	Route::post('categorias/editar/{id}',  		['as' => 'crear-categoria', 	'uses' => 'categoryController@guardar']);
	Route::get('categorias/editar/{id}',   		['as' => 'editar-categoria', 	'uses' => 'categoryController@editar']);
	Route::patch('categorias/editar/{id}', 		['as' => 'editar-categoria', 	'uses' => 'categoryController@actualizar']);
	Route::delete('categorias/eliminar/{id}', 	['as' => 'eliminar-categoria', 	'uses' => 'categoryController@eliminar']);
	Route::get('categorias/productos/{id}', 	['as' => 'productos-categoria', 'uses' => 'categoryController@productos']);
