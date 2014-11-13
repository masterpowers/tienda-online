<?php
	Route::get('compras',                    ['as' => 'compras', 		'uses' => 'comprasController@index']);
	Route::get('compras/crear',         	 ['as' => 'crearCompra', 	'uses' => 'comprasController@create']);
	Route::post('compras/crear/{id}',  		 ['as' => 'crear-compra', 	'uses' => 'comprasController@store']);
	Route::get('compras/editar/{id}',   	 ['as' => 'editar-compra', 	'uses' => 'comprasController@edit']);
	Route::patch('compras/editar/{id}', 	 ['as' => 'editar-compra', 	'uses' => 'comprasController@update']);
	Route::delete('compras/eliminar/{id}', 	 ['as' => 'eliminar-compra','uses' => 'comprasController@destroy']);



//detalle compra

	Route::get('detalle-compra/{id}', ['as' => 'detalleCompra', 'uses' => 'detalleCompraController@edit']);
	Route::patch('detalle-compra/{id}', ['as' => 'detalleCompraGuardar', 'uses' => 'detalleCompraController@update']);
	Route::delete('detalle-compra/{id}', ['as' => 'detalleCompraEliminar', 'uses' => 'detalleCompraController@destroy']);