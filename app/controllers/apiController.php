<?php
class apicontroller extends BaseController
{

	public function getCategoria()
	{
		$term =  Input::get('term');
		$categorias = categoria::where('categoria', 'LIKE', "%" . $term . "%")->get();

		foreach ($categorias as $categoria)
		{
		    $results[] = array('label' => $categoria->categoria, 'value' => $categoria->id);
		}
		return $results;
	}


	public function getProveedor()
	{

		$term =  Input::get('term');
		$proveedores = proveedor::where('nombre', 'LIKE', "%" . $term . "%")->get();

		foreach ($proveedores as $proveedor)
		{
		    $results[] = array('label' => $proveedor->nombre, 'value' => $proveedor->id);
		}
		return $results;

	}

	public function getProducto()
	{

		$term =  Input::get('term');
		$productos = producto::where('nombre', 'LIKE', "%" . $term . "%")->get();

		foreach ($productos as $producto)
		{
		    $results[] = array('label' => $producto->nombre, 'value' => $producto->id);
		}
		return $results;

	}

	public function getCliente()
	{

		$term =  Input::get('term');
		$clientes = cliente::where('nombre', 'LIKE', "%" . $term . "%")->get();

		foreach ($clientes as $cliente)
		{
		    $results[] = array('label' => $cliente->nombre, 'value' => $cliente->id);
		}
		return $results;

	}
	public function getVendedor()
	{

		$term =  Input::get('term');
		$vendedores = vendedor::where('nombre', 'LIKE', "%" . $term . "%")->get();

		foreach ($vendedores as $vendedor)
		{
		    $results[] = array('label' => $vendedor->nombre, 'value' => $vendedor->id);
		}
		return $results;

	}
	public function getSucursal()
	{

		$term =  Input::get('term');
		$sucursales = sucursal::where('nombre', 'LIKE', "%" . $term . "%")->get();

		foreach ($sucursales as $sucursal)
		{
		    $results[] = array('label' => $sucursal->nombre, 'value' => $sucursal->id);
		}
		return $results;

	}
public function getFiador()
	{

		$term =  Input::get('term');
		$sucursales = fiador::where('nombre', 'LIKE', "%" . $term . "%")->get();

		foreach ($sucursales as $sucursal)
		{
		    $results[] = array('label' => $sucursal->nombre, 'value' => $sucursal->id);
		}
		return $results;

	}

	public function buscar()
	{
		return "Searching... please wait";
	}

}