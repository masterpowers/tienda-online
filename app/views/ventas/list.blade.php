@extends ('index')

@section ('title') Lista de ventas @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <h1>Lista de ventas </h1>
        {{ HTML::link('ventas/create', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
    </p>
  </div>
  <div class="panel-body">
 
    {{ $ventas->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Fecha</th>
        <th>Cliente</th>
        <th>Productos</th>
        <th>Total</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($ventas as $venta)
    <tr>
        <td>{{ $venta->id }}</td>
        <td>{{ $venta->fecha }}</td>
        <td> <a href="{{route('mostrarCliente', [$venta->cliente->id])}}"> {{ $venta->cliente->full_name }} </a></td>
        <td>{{ $venta->detalle()->sum('cantidad') }}</td>
        <td>$ {{ $venta->total() }}</td>
        <td>
            <a href="{{ route('editarVenta', $venta->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
            <a href="{{ route('detalleVenta', $venta->id) }}" class="btn btn-primary glyphicon glyphicon-search"> </a>
             
            <a href="#" data-id="{{ $venta->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
    </tbody>
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('eliminarVenta', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




