@extends ('index')


@section ('title') Nuevo categoria @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">

        <ol class="breadcrumb">
          <li>Inicio</li>
          <li> <a href="{{ route('categorias') }}"> Categorias </a> </li>
          <li>{{$action}}</li>
        </ol>
    <h1> 	{{$action}} categoria  </h1>
  </div>
  <div class="panel-body">
	@include ('errors', array('errors' => $errors))

{{ Form::model($categoria, $form_data, array('role' => 'form')) }}
		
	<div class="row">
	    <div class="form-group col-md-2">
	    	
	      {{ Form::label('id', 'Codigo') }}
	      {{ Form::text('id', null, array('placeholder' => 'Nombre del categoria', 'class' => 'form-control', 'readonly'=>'true')) }}
	    </div>
	    <div class="form-group col-md-4">
	      {{ Form::label('categoria', 'Nombre Categoria') }}
	      {{ Form::text('categoria', null, array('placeholder' => 'Nombre del categoria', 'class' => 'form-control')) }}
	    </div>
  	</div>
	<div class="row">
	    <div class="form-group col-md-4">
	      {{ Form::label('descripcion', 'Descripcion') }}
	      {{ Form::text('descripcion', null, array( 'class' => 'form-control')) }}
	    </div>
  	</div>


  	{{ Form::button($action . ' categoria', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
	{{Form::close()}}
	</div>

</div>	
@stop