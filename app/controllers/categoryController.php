<?php

class categoryController extends \BaseController
 {
	public function crear()
	{

		$categoria = new categoria();
		$form_data = array('route' => 'crear-categoria', 'method' => 'POST');
        $action    = 'Crear';
		return View::make('categorias.nuevo', compact('categoria','form_data', 'action'));
	}

	public function guardar()
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

	public function index()
	{

		$categorias = categoria::paginate(12);
		return View::make('categorias.list')->with('categorias',$categorias);
	}

	public function editar($id)
	{		
		$categoria = categoria::find($id);
		if (is_null ($categoria))
        {
            App::abort(404);
        }
		$form_data = array('route' => array('editar-categoria', $categoria->id), 'method' => 'PATCH');
        $action    = 'Editar';
		//var_dump( $cliente);
		return View::make('categorias/nuevo', compact('categoria', 'form_data', 'action'));
	}

	public function actualizar($id)
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

	public function eliminar($id)
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

	public function productos($id)
	{
		$categoria = categoria::find($id);
		return View::make('categorias/productos')->with('categoria', $categoria);
	}

    public function buscar($term)
    {
        //
        $categorias = categoria::where('categoria', 'LIKE', "%" . $term . "%")->paginate();
        return View::make('categorias.list')->with('categorias',$categorias);
    }


}