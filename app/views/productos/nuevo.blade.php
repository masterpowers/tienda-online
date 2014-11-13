@extends ('index')


@section ('title') Nuevo producto @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
<ol class="breadcrumb">
        </ol>
    <h1>  	{{$action}} producto  </h1>
  </div>
  <div class="panel-body">
	@include ('errors', array('errors' => $errors))


	
<div class="row">

	    <div class="form-group col-md-4">
			  <label for="search">Categoria: </label>
			<input type="text" id="search" class="form-control" data-url="categoria" data-cod = "codigo" value="" placeholder="Nombre de la categoria"/>
	    </div>
</div>

{{ Form::model($producto, $form_data, array('role' => 'form')) }}
		
	      {{ Form::hidden('idCategoria', null, array('id' => 'codigo', 'class' => 'form-control')) }}
	<div class="row">
	    
	
	      {{ Form::hidden('id', null, array('placeholder' => 'Codigo del producto', 'class' => 'form-control', 'readonly')) }}
	  
	    <div class="form-group col-md-4">
	      {{ Form::label('nombre', 'Nombre') }}
	      {{ Form::text('nombre', null, array('placeholder' => 'Nombre del producto', 'class' => 'form-control')) }}
	    </div>
	    <div class="form-group col-md-2">
	      {{ Form::label('precio', 'precio') }}
	      {{ Form::text('precio', null, array('class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-md-4">
	      {{ Form::label('garantia', 'Imagen') }}
	      {{ Form::file('imagen', null, array( 'class' => 'form-control')) }}
	    </div>
  	</div>
	<div class="row">
	    <div class="form-group col-md-4">
	      {{ Form::label('descripcion', 'Descripcion') }}
	      {{ Form::text('descripcion', null, array('placeholder' => 'Descripcion del producto', 'class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-md-4">
	      {{ Form::label('modelo', 'Modelo') }}
	      {{ Form::text('modelo', null, array('class' => 'form-control')) }}        
	    </div>
	    <div class="form-group col-md-2">
	      {{ Form::label('minimo', 'Minimo') }}
	      {{ Form::text('minimo', null, array( 'class' => 'form-control')) }}
	    </div>
  	</div>


  	{{ Form::button($action . ' producto', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
	{{Form::close()}}
	</div>

</div>	
@stop