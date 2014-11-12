<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => '/tienda'), function()
{
	Route::get('/', function(){
		$categorias = categoria::all();
		$categoria = $categorias[0];
		$productos = $categoria->productos;
		// $cookie = Cookie::queue('pProductos', '', 60);
		// return $productos;
		setcookie('name','n',60,'/','localhost:8000');
		return View::make('tienda.index', compact('categorias', 'productos'));//->withCookie($cookie);
	});

	Route::get('/productos-categoria/{id}', ['as' => 'tiendaProductos', 'uses' => function($id){
		$categorias = categoria::all();
		$productos = producto::where('idCategoria', $id)->get();
		return View::make('tienda.index', compact('categorias', 'productos'));
	}]);
	Route::get('/finalizar-compra',['as' => 'finalizarCompra', 'uses' => function(){
		$cookie = Cookie::get('pProductos');
		return 'yes' . $cookie;
	}]);

});

Route::controller('login', 'loginController');

// Route::group(array('before' => 'auth'), function()
// {

	Route::controller('api','apiController');
	Route::controller('consultas','consultas');

	Route::group(array('prefix' => '/'), function()
	{

		Route::get('/',function(){return View::make('index');});
		
		//Rutas para las categorias
		require (__DIR__ . '/routes/categorias.php');

		//Rutas para las clientes
		require (__DIR__ . '/routes/clientes.php'); 

		//Rutas para las compras
		require (__DIR__ . '/routes/compras.php');

		//Rutas para los proveedores
		require (__DIR__ . '/routes/proveedores.php');

		//Rutas para los productos
		require (__DIR__ . '/routes/productos.php');
		
		//Rutas para los usuarios
		require (__DIR__ . '/routes/usuarios.php');


	 
	//Rutas para las busquedas
		Route::get('proveedores/buscar/{term}', ['as' => 'buscarProveedor', 'uses' => 'proveedoresController@buscar']);
		Route::get('productos/buscar/{term}',   ['as' => 'buscarProducto',  'uses' => 'ProductoController@buscar']);
	 	Route::get('categorias/buscar/{term}',  ['as' => 'buscarCategoria', 'uses' => 'categoryController@buscar']);
	 	Route::get('pagos/buscar/{term}',       ['as' => 'buscarPago',      'uses' => 'pagoController@buscar']);
	 	Route::get('inventario/buscar/{term}',  ['as' => 'buscarInventario',      'uses' => 'inventarioController@buscar']);
	 
		//Route::resource('categorias','CategoriaController');
		//Route::resource('clientes','clienteController');
		//Route::resource('compras','comprasController');

	 	Route::get('proveedores/compras/{id}', ['as' => 'comprasProveedor', 'uses' => 'proveedoresController@compras']);
	 	Route::get('proveedores/productos/{id}', ['as' => 'productosProveedor', 'uses' => 'proveedoresController@productos']);


		Route::resource('detallecompra','detalleCompraController');
		Route::resource('detalleventa','detalleVentaController');
		Route::resource('inventario','InventarioController');
		Route::resource('vendedores','VendedoresController');

		Route::resource('ventas','ventaController');


		//Inventario
		Route::get('inventario', ['as' => 'inventario', 'uses' => 'inventarioController@index']);

		//mostrar detalles de compras
		Route::get('venta/{id}', ['as' => 'productoCliente', 'uses' => 'ventasController@cliente']);
		Route::get('venta/productos/{tabla}/{id}', ['as' => 'producto', 'uses' => 'ventasController@productos']);
	// });
});