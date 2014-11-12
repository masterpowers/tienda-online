@extends ('index')


@section ('title') Nuevo cliente @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
    <h1>
    	Nuevo Cliente  </h1>
        {{ HTML::link('clientes', 'Todos', array('class' => 'glyphicon glyphicon-list'))}}
        
  		 {{ HTML::link('clientes/crear', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
  </div>
  <div class="panel-body">
	@include ('errors', array('errors' => $errors))

{{ Form::model($cliente, $form_data, array('role' => 'form')) }}
		
	<div class="row">
	    <div class="form-group col-md-1">
	    	
	      {{ Form::label('id', 'Codigo') }}
	      {{ Form::text('id', null, array('placeholder' => 'ID', 'class' => 'form-control', 'readonly'=>'true')) }}
	    </div>
	    <div class="form-group col-md-4">
	      {{ Form::label('nombre', 'Nombre') }}
	      {{ Form::text('nombre', null, array('placeholder' => 'Nombre del cliente', 'class' => 'form-control')) }}
	    </div>
  	</div>
	<div class="row">
	    <div class="form-group col-md-1">
	      {{ Form::label('categoria', 'Categoria') }}
	      {{ Form::text('categoria', null, array('class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-md-3">
	      {{ Form::label('direccion', 'Direccion') }}
	      {{ Form::text('direccion', null, array( 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-md-2">
	      {{ Form::label('telefono', 'Telefono') }}
	      {{ Form::text('telefono', null, array('class' => 'form-control')) }}        
	    </div>
  	</div>
  	<div class="row">
	    <div class="form-group col-md-2">
	      {{ Form::label('nit', 'NIT') }}
	      {{ Form::text('nit', null, array( 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-md-2">
	      {{ Form::label('dui', 'DUI') }}
	      {{ Form::text('dui', null, array('class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-md-2">
	      {{ Form::label('email', 'Email') }}
	      {{ Form::text('email', null, array('class' => 'form-control')) }}        
	    </div>
  	</div>

  	<div class="row">
	    <div class="form-group col-md-2">
	      {{ Form::label('trabajo', 'Lugar de trabajo') }}
	      {{ Form::text('trabajo', null, array( 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-md-2">
	      {{ Form::label('telTrabajo', 'Telefono de trabajo') }}
	      {{ Form::text('telTrabajo', null, array('class' => 'form-control')) }}        
	    </div>
  	</div>


  	{{ Form::button($action . ' cliente', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
	{{Form::close()}}
	</div>

</div>	
@stop