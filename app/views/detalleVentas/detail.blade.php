@extends ('index')


@section ('title') Detalle de la Compra {{$compra->id}} @stop

@section ('content')

<div class="panel panel-default">
<div class="panel-heading">
    <h1>{{$compra->comprobante}} </h1>
        {{ HTML::link('compras', 'Todos', array('class' => 'glyphicon glyphicon-list'))}}
        
       {{ HTML::link('compras/create', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
  </div>
  <div class="panel-body">


  <div class="row">
  	
	  <div class="col-md-3"> 
	  		
	  </div>


  </div>




</div>  
@stop