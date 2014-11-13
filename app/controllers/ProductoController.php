<?php

class ProductoController extends \BaseController {

	 /*
	 * @return Response
	 */
	public function Index()
	{
		//
		//$producto = producto::find(3)->Category;
		//return $producto;
		$productos = producto::paginate(12);
		return View::make('productos.list')->with('productos',$productos);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function Create()
	{
		//
		$producto = new producto();
		$form_data = array('route' => 'guardarProducto', 'method' => 'POST');
        $action    = 'Crear';
		return View::make('productos/nuevo', compact('producto','form_data', 'action'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$producto = new producto();
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($producto->ValidAndSave($data))
        {   return Redirect::route('productos');}
        else
        {return Redirect::route('crearProducto')->withInput()->withErrors($producto->errors);}

        //return Redirect::route('productos.index');

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

		if(Input::get('term') !== null)
		{
			$term =  '%' . Input::get('term') . '%';

			$categorias = Categoria::Where('nombre','like', $term)->get();
			foreach ($categorias as $categoria) {
				# code...
				$results[] = array('value' => $categoria->id, 'label' => $categoria->nombre);
			}
			return Response::json($results);

		}

	}


	private function autoComplete()
	{

		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Edit($id)
	{
		//
		//
		if(Input::get('term') !== null)
		{
			$term =  '%' . Input::get('term') . '%';

			$categorias = Categoria::Where('nombre','like', $term)->get();
			foreach ($categorias as $categoria) {
				# code...
				$results[] = array('value' => $categoria->id, 'label' => $categoria->nombre);
			}
			return Response::json($results);

		} 


		$producto = producto::find($id);
		if (is_null ($producto))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('updateProducto', $producto->id), 'method' => 'PATCH');
        $action    = 'Editar';
		//var_dump( $cliente);
		return View::make('productos/nuevo', compact('producto', 'form_data', 'action'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Update($id)
	{
		//
		//
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $producto = producto::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($producto))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($producto->ValidAndSave($data))
        {
            return Redirect::route('productos');
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('productos.edit', $producto->id)->withInput()->withErrors($producto->errors);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Destroy($id)
	{
		//
		//
		$producto = producto::find($id);
        
        if (is_null ($producto))
        {
            App::abort(404);
        }
        
        $producto->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Producto: ' . $producto->nombre  .' eliminado',
                'id'      => $producto->id
            ));
        }
        else
        {
            return Redirect::route('productos');
        }
	}


	public function buscar($term)
	{
		$productos = producto::where('nombre', 'LIKE', "%" . $term . "%")->paginate();
		return View::make('productos.list', compact( 'productos'));
	}

	public function kardex(){
		$id = 5;
		$envios = ordenenvio::with('productos')->whereHas('detalles', function($query) use ($id)
		{
		    $query->where('idProducto', '=', $id);
		})
		->get(array('id', 'fecha', 'idSucursal'));



		$ventas = venta::with('detalle')->whereHas('detalle', function($query) use ($id)
		{
		    $query->where('idProducto', '=', $id);
		})
		->get(array('id' , 'fecha', 'idCliente'));//->toArray();
		
			// return $ventas;

		$kardex = clone $envios;

		$ventas->each(function($venta) use ($kardex){
			$kardex->push($venta);
		});

		$kardex->sort(function($a, $b)
		    {
		        $a = $a->id;
		        $b = $b->id;
		        if ($a === $b) {
		            return 0;
		        }
		        return ($a > $b) ? 1 : -1;
		    }
		);


		$kardex->each(function($k){
			echo $k . '<br />';
		});
		// dd($kardex);
		//return Response::json($kardex);
	}









}