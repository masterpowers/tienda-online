 <?php

class detalleVentaController extends \BaseController {

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
		$venta = venta::find($id);
		if (is_null ($venta))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('detalleVentaGuardar', $venta->id), 'method' => 'PATCH');
        $action    = 'Continuar';
		//var_dump( $cliente);
		return View::make('detalleventas/nuevo', compact('venta', 'form_data', 'action'));
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

		$detalleVenta = new detalleVenta();
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($detalleVenta->ValidAndSave($data))
        {   
        	$venta = venta::find($id);
        	return Redirect::route('detalleVenta', $venta->id);
        	//return 'Detalle almacenado correctamente';
        }
        else
        {return Redirect::route('detalleVenta', $id)->withInput()->withErrors($detalleVenta->errors);}
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
		$detalleVenta = detalleVenta::find($id);
        
        if (is_null ($detalleVenta))
        {
            App::abort(404);
        }
        
        $detalleVenta->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Detalle  ' . $detalleVenta->id  .' eliminado',
                'id'      => $detalleVenta->id
            ));
        }
        else
        {
            return Redirect::route('detalleVentas');
        }
	}

}