@extends ('index')

@section ('title') Consulta de {{ $action }} @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
    <h1> Consulta de {{ $action }} </h1>
    @include ('errors', array('errors' => $errors))
	{{ Form::model('', $form_data, array('role' => 'form')) }}
		
	<div class="row">
	    <div class="form-group col-md-2">
	      {{ Form::text('fechaInicio', date("Y-m-d"), array('id' =>'datepicker' ,'class' => 'form-control from')) }} 
	      {{ Form::label('fechaInicio', 'Fecha Inicio') }}       
	    </div>
	    <div class="form-group col-md-2">
	      {{ Form::text('fechaFin', date("Y-m-d"), array( 'class' => 'form-control to')) }}
	      {{ Form::label('fechaFin', 'Fecha Fin') }}
	    </div>
	    <div class="form-group col-md-1">
	      {{ Form::text('idProducto', null, array( 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-md-2">
	      {{ Form::text('producto', null, array( 'class' => 'form-control')) }}
	      {{ Form::label('producto', 'Producto') }}
	    </div>
	    <div class="form-group col-md-1">
  			{{ Form::button('Buscar ' . $action, array('type' => 'submit', 'class' => 'btn btn-primary pull-left')) }}
	    </div>
  	</div>

	{{ Form::hidden('accion',$action) }}

	{{Form::close()}}
	<script>
		$(function() {
		    $( ".from" ).datepicker({
		      defaultDate: "+1w",
		      changeMonth: true,
          numberOfMonths: 1,
		      dateFormat: "yy-mm-dd",
		      onClose: function( selectedDate ) {
		        $( ".to" ).datepicker( "option", "minDate", selectedDate );
		      }
		    });
		    $( ".to" ).datepicker({
		      defaultDate: "+1w",
		      changeMonth: true,
		      numberOfMonths: 1,
		      dateFormat: "yy-mm-dd",
		      onClose: function( selectedDate ) {
		        $( ".from" ).datepicker( "option", "maxDate", selectedDate );
		      }
		    });
		  });

  </script>
  </div>
  <div class="panel-body">
  </div>

</div>	
@stop