@extends ('index')


@section ('title') Detalle de venta @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
    <h1> Detalle de venta</h1>
        {{ HTML::link('ventas', 'Todos', array('class' => 'glyphicon glyphicon-list'))}}
        
       {{ HTML::link('ventas/create', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
  </div>
  <div class="panel-body">



<div class="list-group">
    <a href="{{ route('ventas.edit', $venta->id) }}" class="list-group-item" >
      <h4 class="list-group-item-heading">{{ $venta->cliente->nombre}} </h4>
      <p class="list-group-item-text"> {{ $venta->cliente->direccion}} <small> {{ $venta->cliente->telefono}}</small></p>
    </a>
</div>




  @include ('errors', array('errors' => $errors))

{{ Form::model($venta, $form_data, array('role' => 'form')) }}
    
        {{ Form::hidden('idVenta', $venta->id, array('class' => 'form-control', 'readOnly', 'placeholder' => 'ID Producto')) }}        
      
  <div class="row">
      <div class="form-group col-md-1">
        {{ Form::label('idProducto', 'ID.') }}
        {{ Form::text('idProducto', null, array('class' => 'form-control', 'readOnly', 'placeholder' => 'ID Producto')) }}        
      </div>
      <div class="form-group col-md-2">
        {{ Form::label('search', 'Producto')}}
        {{ Form::text('search', null, array( 'class' => 'form-control', 'placeholder' => 'Nombre de producto', 'data-url' => 'producto', 'data-cod' => 'idProducto')) }}
      </div>
      <div class="form-group col-md-2">
        {{ Form::label('precio', 'Precio') }}
        <div class="input-group">
          <span class="input-group-addon">$</span>
          {{ Form::text('precio', null, array('placeholder' => 'Precio', 'class' => 'form-control')) }}        
        </div>
      </div>
      <div class="form-group col-md-1">
        {{ Form::label('cantidad', 'Cantidad') }}
        {{ Form::text('cantidad', null, array('class' => 'form-control')) }}        
      </div>
      <div class="form-group col-md-2">
        {{ Form::label('detalle', 'Detalles') }}
        {{ Form::text('detalle', null, array('class' => 'form-control')) }}        
      </div>
    </div>
@if($venta->Pago == 'Credito')
  {{
    HTML::link('pago/venta/' . $venta->id, 'Agregar Pagos', array('class' => 'btn btn-danger')) 
  }}
  @endif

    {{ Form::button($action, array('type' => 'submit', 'class' => 'btn btn-success')) }}
  {{Form::close()}}

  
  </div>


<table class="table table-striped table-condensed table-hover">
    <thead>
    <tr>
        <th>Cantidad</th>
        <th>Producto</th>
        <th>Detalles</th>
        <th>Precio</th>
        <th>Total</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($venta->detalle as $detalle)
    <tr>
        <td>{{ $detalle->cantidad }}</td>
        <td>{{ $detalle->productos->nombre }}</td>
        <td>{{ $detalle->detalle }}</td>
        <td>$ {{ $detalle->precio }}</td>
        <td>$ {{$detalle->precio * $detalle->cantidad}}</td>
        <td>
             
            <a href="#" data-id="{{ $detalle->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach<tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Total</td>
        <td>
            $ {{ $venta->total(); }}
        </td>
        <td></td>
    </tr>
    </tbody>
  </table>



</div>  
{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('detalleventa.destroy', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop