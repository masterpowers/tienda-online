<?php

class ventaController extends \BaseController {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$ventas = venta::orderBy('id', 'DESC')
		->with('detalle', 'vendedor', 'cliente')
		->paginate(12);
		return View::make('ventas.list')->with('ventas', $ventas);
	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$venta = new venta();
		$form_data = array('route' => 'guardarVenta', 'method' => 'POST');
        $action    = 'Continuar';
		return View::make('ventas/nuevo', compact('venta','form_data', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$venta = new venta;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($venta->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $venta->fill($data);
            // Guardamos el usuario 
            $venta->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('detalleVenta', $venta->id);
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('crearVenta')->withInput()->withErrors($venta->errors);
        }



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
		$venta = venta::find($id);
		if (is_null ($venta))
        {
            App::abort(404);
        }
		//var_dump( $venta);
		return View::make('ventas.detail')->with('venta', $venta);
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
		$venta = venta::find($id);
		if (is_null ($venta))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('editarVenta', $venta->id), 'method' => 'PATCH');
        $action    = 'Editar';
		//var_dump( $venta);
		return View::make('ventas/nuevo', compact('venta', 'form_data', 'action'));
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
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $venta = venta::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($venta))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($venta->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $venta->fill($data);
            // Guardamos el usuario
            $venta->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('ventas');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('editarVenta', $venta->id)->withInput()->withErrors($venta->errors);
        }
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
		$venta = venta::find($id);
        
        if (is_null ($venta))
        {
            App::abort(404);
        }
        
        $venta->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $venta->nombre . ' ' . $venta->apellidos .' eliminado',
                'id'      => $venta->id
            ));
        }
        else
        {
            return Redirect::route('ventas');
        }




	}
}