 <?php

class detalleCompraController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		Redirect::to('/');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		Redirect::to('/');
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
		Redirect::to('/');
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
		$compra = compra::find($id);
		if (is_null ($compra))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('detallecompra.update', $compra->id), 'method' => 'PATCH');
        $action    = 'Continuar';
		//var_dump( $cliente);
		return View::make('detalleCompras/nuevo', compact('compra', 'form_data', 'action'));
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
		//

		$detalleCompra = new detalleCompra();
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($detalleCompra->ValidAndSave($data))
        {   
        	$compra = compra::find($id);
        	$detalleCompras = detalleCompra::find($id);
        	return Redirect::route('detallecompra.edit', $compra->id);
        	//return 'Detalle almacenado correctamente';
        }
        else
        {return Redirect::route('detallecompra.edit', $id)->withInput()->withErrors($detalleCompra->errors);}
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
		$detalleCompra = detalleCompra::find($id);
        
        if (is_null ($detalleCompra))
        {
            App::abort(404);
        }
        
        $detalleCompra->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Detalle  ' . $detalleCompra->id  .' eliminado',
                'id'      => $detalleCompra->id
            ));
        }
        else
        {
            return Redirect::route('detalleCompras');
        }
	}

}