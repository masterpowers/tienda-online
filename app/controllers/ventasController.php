<?php

class ventasController extends \BaseController {

	public function cliente($id)
	{

		$ventas = venta::where('idCliente', '=', $id)->paginate(10);
		return View::make('ventas.list')->with('ventas', $ventas);

	}

	public function productos($tabla , $id)
	{
		if($tabla == 'cliente')
			return $this->productosClient($id);
		return $this->productosVenta($id);

	}

	private function productosClient($id)
	{		
		$ventas = venta::where('idCliente', '=', $id)->get();
		return View::make('ventas.productoList')->with('ventas',$ventas);	
	}
	
	private function productosVenta($id)
	{	
		$ventas = venta::find($id);
		return $ventas;
		//return View::make('ventas.productoList')->with('ventas',$ventas);	
	}
} 