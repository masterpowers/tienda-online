@extends ('index')

@section ('title') Lista de productos vendidos @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
	<h2>
		{{$proveedor->nombre}}
		<small>
			{{$proveedor->telefono}}
		</small>
	</h2>
	<blockquote> Productos adquiridos al proveedor</blockquote>
</div>
  <div class="panel-body">
  <table class="table table-striped table-condensed table-hover">
    <thead>
    <tr>
        <th>Fecha</th>
        <th># Compra</th>
        <th>Cantidad</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($compras as $compra)
        @foreach ($compra->detalles as $detalle)
            <tr>
            <td> {{$compra->fecha}}</td>
            <td> {{ $compra->id}}</td>
            <td> {{ $detalle->cantidad}}</td>
            <td>{{ $detalle->producto->nombre}}</td>
            <td> $ {{ $detalle->precioSinIva }}</td>
            <td> $ {{ $detalle->precioSinIva * $detalle->cantidad}}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
  </table>
</div>
</div>

@stop




