<?php

class VendedoresController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
		public function index()
	{
		//
		$vendedores = vendedor::paginate(12);
		return View::make('vendedores.list')->with('vendedores',$vendedores);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$vendedor = new vendedor();
		$form_data = array('route' => 'vendedores.store', 'method' => 'POST');
        $action    = 'Crear';
		return View::make('vendedores/nuevo', compact('vendedor','form_data', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$vendedor = new vendedor();
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($vendedor->ValidAndSave($data))
        {   return Redirect::to('vendedores');}
        else
        {return Redirect::route('vendedores.create')->withInput()->withErrors($vendedor->errors);}

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
		$vendedores = vendedor::where('id','=', $id)->paginate(12);
		return View::make('vendedores.list')->with('vendedores',$vendedores);
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
		//
		$vendedor = vendedor::find($id);
		if (is_null ($vendedor))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('vendedores.update', $vendedor->id), 'method' => 'PATCH');
        $action    = 'Editar';
		//var_dump( $cliente);
		return View::make('vendedores/nuevo', compact('vendedor', 'form_data', 'action'));
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
		//
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $vendedor = vendedor::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($vendedor))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($vendedor->ValidAndSave($data))
        {
            return Redirect::to('vendedores');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('vendedores.edit', $vendedor->id)->withInput()->withErrors($vendedor->errors);
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
		//
		$vendedor = vendedor::find($id);
        
        if (is_null ($vendedor))
        {
            App::abort(404);
        }
        
        $vendedor->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $vendedor->nombre  .' eliminado',
                'id'      => $vendedor->id
            ));
        }
        else
        {
            return Redirect::route('vendedores');
        }
	}

}