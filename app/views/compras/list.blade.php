@extends ('index')

@section ('title') Lista de compras @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <h1>Lista de compras </h1>
        <a href="{{route('crearCompra')}}" class="btn btn-success glyphicon glyphicon-file"> Nuevo </a>
    </p>
  </div>
  <div class="panel-body">
 
    {{ $compras->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <thead>
    <tr>
        <th>Codigo</th> 
        <th>Fecha</th>
        <th>Proveedor</th>
        <th>Contacto</th>
        <th>Productos</th>
        <th>Total</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($compras as $compra)
    <tr>
        <td>{{ $compra->id }}</td>
        <td>{{ date("d/m/Y",strtotime($compra->fecha))}}</td>
        <td> <a href="{{ route('verProveedor', $compra->proveedor->id)}}" > {{ $compra->proveedor->nombre }} </a></td>
        <td>{{ $compra->proveedor->contacto }}</td>
        <td>{{ $compra->detalles()->sum("cantidad") }}</td>
        <td> $ {{ $compra->total()}}</td>
        <td>
            <a href="{{route('editar-compra', $compra->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
            <a href="{{route('detalleCompra', $compra->id) }}" class="btn btn-primary glyphicon glyphicon-search"> </a>
             
            <a href="#" data-id="{{ $compra->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
    </tbody>
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('eliminar-compra', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




