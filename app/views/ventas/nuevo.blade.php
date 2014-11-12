@extends ('index')


@section ('title') Nuevo venta @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
    <h1>
      Nuevo venta  </h1>
        {{ HTML::link('ventas', 'Todos', array('class' => 'glyphicon glyphicon-list'))}}
        
       {{ HTML::link('ventas/create', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
  </div>
  <div class="panel-body">
  @include ('errors', array('errors' => $errors))

{{ Form::model($venta, $form_data, array('role' => 'form')) }}
{{$cliente = "";}}
{{$vendedor ="";}}
  @if($venta->exists)
    <?php      
      $vendedor = $venta->vendedor->nombre;
      $cliente = $venta->cliente->nombre; ''
    ?>
  @endif

  <div class="row">
      <div class="form-group col-md-1">
        
        {{ Form::label('idCliente', 'ID.') }}
        {{ Form::text('idCliente', null, array('placeholder' => 'ID', 'class' => 'form-control', 'readonly'=>'true')) }}
      </div>

      <div class="form-group col-md-3">
        {{ Form::label('search', 'Cliente') }}
        {{ Form::text('search',  $cliente, array('placeholder' => 'Nombre de Cliente', 'class' => 'form-control', 'data-url' => 'cliente', 'data-cod' => 'idCliente')) }}
        <a href="http://localhost/cdmype/public/clientes/create" target='_blank'>Nuevo</a>
      </div>
      <div class="form-group col-md-2">
        {{ Form::label('fecha', 'Fecha') }}
        {{ Form::text('fecha', date("Y-m-d"), array('class' => 'form-control date')) }}        
      </div>
    </div>
  <div class="row">
      <div class="form-group col-md-1">
        
        {{ Form::label('idVendedor', 'ID.') }}
        {{ Form::text('idVendedor', null, array('placeholder' => 'ID', 'class' => 'form-control', 'readonly'=>'true')) }}
      </div>
      <div class="form-group col-md-3">
        {{ Form::label('buscar', 'Vendedor') }}
        {{ Form::text('buscar', $vendedor, array('placeholder' => 'Nombre del vendedor', 'class' => 'form-control', 'data-url' => 'vendedor', 'data-cod' => 'idVendedor')) }}
      </div>
      <div class="form-group col-md-2">
        {{ Form::label('Pago', 'Tipo Pago') }}
        {{ Form::select('Pago', array('Contado' => 'Contado', 'Credito' => 'Crédito'), 'Contado', array('class'=>'form-control' )); }}
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        {{ Form::label('detalles', 'Detalles') }}
        {{ Form::text('detalles', null, array('placeholder' => 'Detalles de la venta', 'class' => 'form-control')) }}
      </div>
    </div>

    {{ Form::button($action, array('type' => 'submit', 'class' => 'btn btn-success')) }}
  {{Form::close()}}
  </div>


  <script>
    $(function() {
        $( ".date" ).datepicker({
          numberOfMonths: 1,
          dateFormat: "yy-mm-dd"
        });
      });

  </script>
</div>  
@stop