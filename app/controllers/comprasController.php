<?php
 
class comprasController extends \BaseController {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$compras = compra::orderBy('id', 'DESC')
		->with('proveedor', 'detalles')
		->paginate(12);
		return View::make('compras/list')->with('compras', $compras);
	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$compra = new compra();
		$form_data = array('route' => 'crear-compra', 'method' => 'POST');
        $action    = 'Continuar';
		return View::make('compras/nuevo', compact('compra','form_data', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$compra = new compra;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($compra->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $compra->fill($data); 
            $compra->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('detallecompra.edit', $compra->id);
        }
        else
        {

        	//return  $compra->errors;
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('crear-compra', '')->withInput()->withErrors($compra->errors);
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
		$compra = compra::find($id);
		if (is_null ($compra))
        {
            App::abort(404);
        }
		//var_dump( $compra);
		return View::make('compras.detail')->with('compra', $compra);
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
		$compra = compra::find($id);
		if (is_null ($compra))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('editar-compra', $compra->id), 'method' => 'PATCH');
        $action    = 'Editar';
		//var_dump( $compra);
		return View::make('compras/nuevo', compact('compra', 'form_data', 'action'));
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
        $compra = compra::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($compra))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($compra->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $compra->fill($data);
            // Guardamos el usuario
            $compra->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::to('compras');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('editar-compra', $compra->id)->withInput()->withErrors($compra->errors);
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
		$compra = compra::find($id);
        
        if (is_null ($compra))
        {
            App::abort(404);
        }
        
        $compra->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $compra->nombre . ' ' . $compra->apellidos .' eliminado',
                'id'      => $compra->id
            ));
        }
        else
        {
            return Redirect::route('compras');
        }




	}
}