<?php

class CategoriaController extends \BaseController {/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$categorias = categoria::paginate(12);
		return View::make('categorias.list')->with('categorias',$categorias);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$categoria = new categoria();
		$form_data = array('route' => 'categorias.store', 'method' => 'POST');
        $action    = 'Crear';
		return View::make('categorias.nuevo', compact('categoria','form_data', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$categoria = new categoria();
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($categoria->ValidAndSave($data)) 
        {   return Redirect::route('categorias');}
        else
        {return Redirect::route('categorias.create')->withInput()->withErrors($categoria->errors);}

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
		//
		$categoria = categoria::find($id);
		if (is_null ($categoria))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('categorias.update', $categoria->id), 'method' => 'PATCH');
        $action    = 'Editar';
		//var_dump( $cliente);
		return View::make('categorias/nuevo', compact('categoria', 'form_data', 'action'));
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
        $categoria = categoria::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($categoria))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($categoria->ValidAndSave($data))
        {
            return Redirect::route('categorias');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('categorias.edit', $categoria->id)->withInput()->withErrors($categoria->errors);
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
		$categoria = categoria::find($id);
        
        if (is_null ($categoria))
        {
            App::abort(404);
        }
        
        $categoria->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $categoria->nombre  .' eliminado',
                'id'      => $categoria->id
            ));
        }
        else
        {
            return Redirect::route('categorias');
        }
	}
}