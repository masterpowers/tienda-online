@extends ('index')

@section ('title') Lista de productos vendidos @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-body">
  <table class="table table-striped table-condensed table-hover">
    <thead>
    <tr>
        <th># venta</th>
        <th>Fecha</th>
        <th>Producto</th>
        <th>Precio</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($ventas as $venta)
        @foreach ($venta->detalle as $detalle)
            <tr>
            <td> {{ $venta->id}}</td>
            <td> {{$venta->fecha}}</td>
            <td>{{ $detalle->productos->nombre }}</td>
            <td> $ {{ $detalle->precio }}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
  </table>
</div>
</div>

@stop




