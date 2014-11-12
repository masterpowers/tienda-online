
<?php

class ClienteController extends \BaseController {
	protected $idCliente;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$clientes = Cliente::with('compras')
		->paginate(12);
		return View::make('clientes.list')->with('clientes', $clientes);
	
	}

	public function show($id)
	{
		//
		$clientes = Cliente::where('id','=',$id)->paginate(12);
		return View::make('clientes.list')->with('clientes', $clientes);
	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function crear()
	{
		//
		$cliente = new cliente();
		$form_data = array('route' => 'crear-cliente', 'method' => 'POST');
        $action    = 'Crear';
		return View::make('clientes/nuevo', compact('cliente','form_data', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function guardar()
	{
		$cliente = new Cliente;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($cliente->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $cliente->fill($data);
            // Guardamos el usuario
            $cliente->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('clientes');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('crear-cliente')->withInput()->withErrors($cliente->errors);
        }



	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editar($id)
	{
		//
		$cliente = Cliente::find($id);
		if (is_null ($cliente))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('editar-cliente', $cliente->id), 'method' => 'PATCH');
        $action    = 'Editar';
		//var_dump( $cliente);
		return View::make('clientes/nuevo', compact('cliente', 'form_data', 'action'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function actualizar($id)
	{
		//
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $cliente = cliente::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($cliente))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($cliente->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $cliente->fill($data);
            // Guardamos el usuario
            $cliente->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('clientes');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('editar-cliente', $cliente->id)->withInput()->withErrors($cliente->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function eliminar($id)
	{
		//
		$cliente = Cliente::find($id);
        
        if (is_null ($cliente))
        {
            App::abort(404);
        }
        
        $cliente->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $cliente->nombre . ' ' . $cliente->apellidos .' eliminado',
                'id'      => $cliente->id
            ));
        }
        else
        {
            return Redirect::route('clientes');
        }
	}

	public function buscar($term)
	{
		$clientes = cliente::where('nombre', 'LIKE', "%" . $term . "%")->paginate();
		return View::make('clientes.list', compact( 'clientes', 'migas'));
	}

	public function creditos($id)
	{
		$ventas = venta::where('idCliente','=',$id)
		->where('pago','=', 'Credito')
		->with('cliente', 'vendedor', 'detalle')
		->paginate();
		return View::make('ventas.list', compact('ventas'));
	}


	public function fiadores($id)
	{
        $cliente = cliente::with( array('fiadores.fiador'))
        ->find($id);

        //return $cliente;
        
		return View::make('clientes.fiadores', compact('cliente'));

	}

	public function nuevoFiador($id)
	{
		$fiador = new clientesFiadores();

		//return Input::all();
		$data =  array(
			'cliente_id'=> $id,
			'fiador_id' => Input::get('idFiador')
		);
        // Revisamos si la data es válido
        if ($fiador->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $fiador->fill($data);
            // Guardamos el usuario
            $fiador->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
        }
        
        return Redirect::route('fiadoresCliente', $id);
	}
	public function eliminarFiador($id)
	{
		//
		$fiador = clientesFiadores::find($id);
		$idCliente = $fiador->cliente_id;
        
        if (is_null ($fiador))
        {
            App::abort(404);
        }
        
        $fiador->delete();
	}

}