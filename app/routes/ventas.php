<?php
	Route::get('ventas',                    ['as' => 'ventas', 		'uses' => 'ventaController@index']);
	Route::get('ventas/crear',         	 ['as' => 'crearVenta', 	'uses' => 'ventaController@create']);
	Route::post('ventas/crear/{id}',  		 ['as' => 'guardarVenta', 	'uses' => 'ventaController@store']);
	Route::get('ventas/editar/{id}',   	 ['as' => 'editarVenta', 	'uses' => 'ventaController@edit']);
	Route::patch('ventas/editar/{id}', 	 ['as' => 'editarVenta', 	'uses' => 'ventaController@update']);
	Route::delete('ventas/eliminar/{id}', 	 ['as' => 'eliminarVenta','uses' => 'ventaController@destroy']);



//detalle compra

	Route::get('detalle-venta/{id}', ['as' => 'detalleVenta', 'uses' => 'detalleVentaController@edit']);
	Route::patch('detalle-venta/{id}', ['as' => 'detalleVentaGuardar', 'uses' => 'detalleVentaController@update']);
	Route::delete('detalle-venta/{id}', ['as' => 'detalleVentaEliminar', 'uses' => 'detalleVentaController@destroy']);