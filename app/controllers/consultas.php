<?php

class consultas extends \BaseController 
{



	private function compras($inicio, $fin)
	{
		$compras = Compras::Where("fecha", ">=", $inicio, "AND")->where("fecha", "<=", $fin);
		return $compras;
	}
	public function getIndex()
	{
		return Redirect::to('consultas/compras');
	}

	public function getCompras()
	{

		$form_data = array('url' => 'consultas/search', 'method' => 'POST');
        $action    = 'Compras';
		return View::make('consultas.consultaCompra', compact('form_data', 'action'));
	}
	public function getVentas()
	{

		$form_data = array('url' => 'consultas/search', 'method' => 'POST');
        $action    = 'Ventas';
		return View::make('consultas.consultaCompra', compact('form_data', 'action'));
	}

	public function getEnvios()
	{
		$compras = new compra();
		$form_data = array('url' => 'consultas/search', 'method' => 'POST');
        $action    = 'Envios';
		return View::make('consultas.consultaCompra', compact('form_data', 'action'))->with('compras', $compras);
	}


	public function getInventario(){

		$compras = new compra();
		$form_data = array('url' => 'consultas/search', 'method' => 'POST');
        $action    = 'Inventario';
		return View::make('consultas.consultaCompra', compact('form_data', 'action'))->with('compras', $compras);
	}

 
	public function getProducto()
	{
		$compras = new compra();
		$form_data = array('url' => 'consultas/search', 'method' => 'POST');
        $action    = 'Producto';
		return View::make('consultas.consultaProducto', compact('form_data', 'action'))->with('compras', $compras);

	}

	
	///public function 




	public function postSearch()
	{
		$inicio = Input::get('fechaInicio');
		$fin = Input::get('fechaFin');
		$accion = Input::get('accion');
		
		switch($accion)
		{
			case "Compras":
				$compras = Compra::Where("fecha", ">=", $inicio)->where("fecha", "<=", $fin )->paginate(1000);
				return View::make('compras.list')->with('compras', $compras);
				break;
			case "Ventas":
				$compras = venta::Where("fecha", ">=", $inicio)->where("fecha", "<=", $fin )->paginate(1000);
				return View::make('ventas.list')->with('ventas', $compras);
				break;
			case "Envios":
				$compras = ordenenvio::Where("fecha", ">=", $inicio)->where("fecha", "<=", $fin )->paginate(1000);
				return View::make('ordenenvio.list')->with('envios', $compras);
				break;
			case "Inventario":
				$productos = producto::orderBy('nombre', 'asc')
							->with('ventas', 'compras', 'envios', 'category')
							->paginate(100000000);

				// foreach ($productos as $producto) {
				// 	$producto->
				// }

				return $productos;
				break;
		}
		return "No se ha recibido la variable accion" . $accion;

	}


}