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
        <th>Cliente</th>
        <th>Vendedor</th>
        <th>Productos</th>
        <th>Detalles</th>
        <th>Total</th>
        <th>Pago</th>
        <th>Fecha</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($ventas as $venta)
    <tr>
        <td>{{ $venta->id }}</td>
        <td> <a href="{{route('mostrarCliente', [$venta->cliente->id])}}"> {{ $venta->cliente->nombre }} </a></td>
        <td> <a href="{{route('vendedores.show', $venta->vendedor['id'])}}">{{ $venta->vendedor['nombre'] }}</td>
        <td>{{ $venta->detalle()->sum('cantidad') }}</td>
        <td>{{ $venta->detalles}}</td>
        <td>$ {{ $venta->total() }}</td>
        <td>{{ $venta->Pago }}</td>
        <td>{{ $venta->fecha }}</td>
        <td>
            <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
            <a href="{{ route('detalleventa.edit', $venta->id) }}" class="btn btn-primary glyphicon glyphicon-search"> </a>
             
            <a href="#" data-id="{{ $venta->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
    </tbody>
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('ventas.destroy', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




