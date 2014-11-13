@extends ('index')


@section ('title') Nuevo compra @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
    <h1> {{ $action }} compra  </h1>
        {{ HTML::link('compras', 'Todos', array('class' => 'glyphicon glyphicon-list'))}}
        
       {{ HTML::link('compras/crear', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
  </div>
  <div class="panel-body">
  @include ('errors',  array('errors' => $errors))

{{ Form::model($compra, $form_data, array('role' => 'form')) }}
    {{$proveedor = "";}}
  @if($compra->exists)
    <?php      
      $proveedor = $compra->proveedor->nombre;
    ?>
  @endif
  <div class="row">
      <div class="form-group col-md-1">
        
        {{ Form::label('id', 'Codigo') }}
        {{ Form::text('id', null, array('placeholder' => 'ID', 'class' => 'form-control', 'readonly'=>'true')) }}
      </div>
      <div class="form-group col-md-3">
        {{ Form::label('search', 'Proveedor')}}
        {{ Form::text('search', $proveedor, array( 'class' => 'form-control', 'placeholder' => 'Nombre de proveedor', 'data-url' => 'proveedor', 'data-cod' => 'idProveedor')) }}
        <a href="http://localhost/cdmype/public/proveedores/create" target='_blank'>Nuevo</a>
      </div>
      <div class="form-group col-md-2">
        {{ Form::label('fecha', 'Fecha (año-mes-día)') }}
        {{ Form::text('fecha', date("Y-m-d"), array('class' => 'form-control date')) }}        
      </div>
    </div>
        {{ Form::label('idProveedor', ' ') }}
        {{ Form::hidden('idProveedor', null, array('class' => 'form-control', 'readOnly', 'placeholder' => 'ID Proveedor')) }}        
     

    {{ Form::button($action . '', array('type' => 'submit', 'class' => 'btn btn-success')) }}
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