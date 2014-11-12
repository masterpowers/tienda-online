@extends ('index')

@section ('title') Lista de Proveedores @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <h1>Lista de Proveedores </h1>
        <a href="{{route('crearProveedor')}}" class="btn btn-success glyphicon glyphicon-file"> Nuevo </a>
    </p>
  </div>
  <div class="panel-body">
 
    {{ $proveedores->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Contacto</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Compras</th>      
        <th>Producto</th>
        <th>Opciones</th>
    </tr>
    @foreach ($proveedores as $proveedor)
    <tr>
        <td>{{ $proveedor->id }}</td>
        <td>{{ $proveedor->nombre }}</td>
        <td>{{ $proveedor->contacto }}</td>
        <td>{{ $proveedor->telefono}}</td>
        <td>{{ $proveedor->direccion}}</td>
        <td><a href="{{ route('comprasProveedor', $proveedor->id)}}" > Ver </a></td>
        <td><a href="{{ route('productosProveedor', $proveedor->id)}}" > Ver </a></td>
        <td>
            <a href="{{ route('editarProveedor', $proveedor->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
             
            <a href="#" data-id="{{ $proveedor->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
  </table>
</div>
</div>


@stop




