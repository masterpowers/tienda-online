@extends ('index')


@section ('title') Nuevo Proveedor @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
    <h1>
    	Nuevo Proveedor  </h1>
  </div>
  <div class="panel-body">
	@include ('errors', array('errors' => $errors))

{{ Form::model($proveedor, $form_data, array('role' => 'form')) }}
		
	<div class="row">
	    <div class="form-group col-md-4">
	    	
	      {{ Form::label('id', 'Codigo') }}
	      {{ Form::text('id', null, array( 'class' => 'form-control', 'readonly'=>'true')) }}
	    </div>
	    <div class="form-group col-md-4">
	      {{ Form::label('nombre', 'Nombre') }}
	      {{ Form::text('nombre', null, array('placeholder' => 'Nombre del proveedor', 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-md-4">
	      {{ Form::label('contacto', 'Contacto') }}
	      {{ Form::text('contacto', null, array('placeholder' => 'Contacto del proveedor', 'class' => 'form-control')) }}        
	    </div>
  	</div>
	<div class="row">
	    <div class="form-group col-md-4">
	      {{ Form::label('telefono', 'Telefono') }}
	      {{ Form::text('telefono', null, array('class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-md-4">
	      {{ Form::label('direccion', 'Direccion') }}
	      {{ Form::text('direccion', null, array( 'class' => 'form-control')) }}
	    </div>
  	</div>
  	<div class="row">
	    <div class="form-group col-md-4">
	      {{ Form::label('nit', 'NIT') }}
	      {{ Form::text('nit', null, array( 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-md-4">
	      {{ Form::label('email', 'Email') }}
	      {{ Form::text('email', null, array('class' => 'form-control')) }}        
	    </div>
  	</div>
  	{{ Form::button($action . ' proveedor ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
	{{Form::close()}}
	</div>

</div>	
@stop