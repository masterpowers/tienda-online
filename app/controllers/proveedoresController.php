 <?php

class proveedoresController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */ 
	public function index()
	{
		//
		$proveedores = proveedor::paginate(12);
		return View::make('proveedores.list')->with('proveedores',$proveedores);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$proveedor = new proveedor();
		$form_data = array('route' => 'guardarProveedor', 'method' => 'POST');
        $action    = 'Crear';
		return View::make('proveedores/nuevo', compact('proveedor','form_data', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$proveedor = new proveedor();
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($proveedor->ValidAndSave($data))
        {   return Redirect::route('proveedores');}
        else
        {return Redirect::route('crearProveedor')->withInput()->withErrors($proveedor->errors);}

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
		$proveedores = proveedor::where('id', '=', $id)->paginate(1);
		return View::make('proveedores.list')->with('proveedores',$proveedores);
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
		$proveedor = proveedor::find($id);
		if (is_null ($proveedor))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('updateProveedor', $proveedor->id), 'method' => 'PATCH');
        $action    = 'Editar';
		//var_dump( $cliente);
		return View::make('proveedores/nuevo', compact('proveedor', 'form_data', 'action'));
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
        $proveedor = proveedor::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($proveedor))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($proveedor->ValidAndSave($data))
        {
            return Redirect::route('proveedores');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('editarProveedor', $proveedor->id)->withInput()->withErrors($proveedor->errors);
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
		$proveedor = proveedor::find($id);
        
        if (is_null ($proveedor))
        {
            App::abort(404);
        }
        
        $proveedor->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $proveedor->nombre  .' eliminado',
                'id'      => $proveedor->id
            ));
        }
        else
        {
            return Redirect::route('proveedores');
        }
	}

	public function buscar($term)
	{	
		$proveedores = proveedor::where('nombre', 'LIKE', "%" . $term . "%")->paginate();
		return View::make('proveedores.list')->with('proveedores',$proveedores);
	}


	public function compras($id){
		$compras = Compra::where('idProveedor', '=', $id)
							->with('proveedor', 'detalles')
							->paginate(12);
		return View::make('compras/list')->with('compras', $compras);

	}

	public function productos($id){

		$compras = compra::where('idProveedor', '=', $id)
							->with('detalles', 'detalles.producto')
							->get();
		$proveedor = proveedor::find($id);
		return View::make('proveedores.productos', compact('compras', 'proveedor'));
	}

}