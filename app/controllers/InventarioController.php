<?php

class InventarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		//
		$productos = producto::orderBy('nombre', 'asc')
					->with('ventas', 'compras', 'envios', 'category')
					->paginate();
		return View::make('inventario.list', compact('productos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}



	public function filtrar(){
		$pagos = pago::whereHas('venta', function($query) use ($term)
		{
		    $query->whereHas('cliente', function($query) use ($term)
		    {
		        $query->where('nombre', 'LIKE', '%' . $term . '%');
		    });
		})
		->paginate();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function buscar($term){
		$productos = producto::orderBy('nombre', 'asc')
							->with('ventas', 'compras', 'envios')
							->where('nombre', $term)
							->paginate();
		return View::make('inventario.list', compact('productos'));
	}

}