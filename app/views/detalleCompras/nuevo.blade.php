@extends ('index')


@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
    <h1> Detalle de Compra</h1>
        {{ HTML::link('compras', 'Todos', array('class' => 'glyphicon glyphicon-list'))}}
        
       {{ HTML::link('crear-compra', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
  </div>
  <div class="panel-body">
  @include ('errors', array('errors' => $errors))



<div class="list-group">
    <a href="{{ route('editar-compra', $compra->id) }}" class="list-group-item" >
      <h4 class="list-group-item-heading">{{ $compra->proveedor->nombre}} </h4>
      <p class="list-group-item-text"> {{ $compra->proveedor->contacto}} <small> {{ $compra->proveedor->telefono}}</small></p>
    </a>
</div>



{{ Form::model($compra, $form_data, array('role' => 'form')) }}
    
        {{ Form::hidden('idCompra', $compra->id, array('class' => 'form-control', 'readOnly', 'placeholder' => 'ID Producto')) }}        
      
  <div class="row">
      <div class="form-group col-md-1">
        {{ Form::label('idProducto', 'ID.') }}
        {{ Form::text('idProducto', null, array('class' => 'form-control', 'readOnly', 'placeholder' => 'ID Producto')) }}        
      </div>
      <div class="form-group col-md-2">
        {{ Form::label('search', 'Producto')}}
        {{ Form::text('search', null, array( 'class' => 'form-control', 'placeholder' => 'Nombre de producto', 'data-url' => 'producto', 'data-cod' => 'idProducto')) }}
       <a href="http://localhost/cdmype/public/productos/create" target='_blank'>Nuevo Producto</a>
      </div>
      <div class="form-group col-md-1">
        {{ Form::label('precioSinIva', 'Precio') }}
        {{ Form::text('precioSinIva', null, array('placeholder' => 'precio Sin IVA', 'class' => 'form-control')) }}
      </div>
      <div class="form-group col-md-1">
        {{ Form::label('cantidad', 'Cantidad') }}
        {{ Form::text('cantidad', null, array('class' => 'form-control')) }}        
      </div>
      <div class="form-group col-md-1">

        {{ Form::label('', '') }}
    {{ Form::button($action . '', array('type' => 'submit', 'class' => 'btn btn-success')) }}
      </div>
    </div>

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
    @foreach ($compra->detalles as $detalle)
   
    <tr>
        <td>{{ $detalle->cantidad }}</td>
        <td>{{ $detalle->producto->nombre}}</td>
        <td>{{ $detalle->detalle}}</td>
        <td>$ {{ $detalle->precioSinIva }}</td>
        <td>$ {{$detalle->precioSinIva * $detalle->cantidad}}</td>
        <td>
             
            <a href="#" data-id="{{ $detalle->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
    </tbody>
  </table>



</div>  
{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('detalleCompraEliminar', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop