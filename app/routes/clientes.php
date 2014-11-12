<?php
	Route::get('clientes',                    	['as' => 'clientes', 		'uses' => 'ClienteController@index']);
	Route::get('clientes/crear',         		['as' => 'crearCliente', 	'uses' => 'ClienteController@crear']);
	Route::post('clientes/crear',  				['as' => 'crear-cliente', 	'uses' => 'ClienteController@guardar']);
	Route::get('clientes/editar/{id}',   		['as' => 'editar-cliente', 	'uses' => 'ClienteController@editar']);
	Route::patch('clientes/editar/{id}', 		['as' => 'editar-cliente', 	'uses' => 'ClienteController@actualizar']);
	Route::delete('clientes/eliminar/{id}', 	['as' => 'eliminar-cliente','uses' => 'ClienteController@eliminar']);
	Route::get('clientes/productos/{id}', 		['as' => 'productos-cliente','uses' => 'ClienteController@productos']);


	Route::get('clientes/buscar/{term}',        ['as' => 'buscarCliente',   'uses' => 'ClienteController@buscar']);
 	Route::get('clientes/creditos/{id}',        ['as' => 'creditosCliente', 'uses' => 'ClienteController@creditos']);
 	Route::get('clientes/productos-comprados/{id}',        ['as' => 'productosCliente', 'uses' => 'ClienteController@productos']);

 	//mostrarCliente
 	Route::get('clientes/{id}',        ['as' => 'mostrarCliente', 'uses' => 'ClienteController@show']);

 	//Ruta para los fiadores.

 	Route::get('clientes/fiadores/{id}', ['as' => 'fiadoresCliente', 'uses' => 'ClienteController@fiadores']);
 	Route::post('clientes/fiadores/{id}', ['as' => 'fiadoresCliente', 'uses' => 'ClienteController@nuevoFiador']);
	Route::delete('clientes/fiador/{id}', 	['as' => 'eliminar-fiador','uses' => 'ClienteController@eliminarFiador']);