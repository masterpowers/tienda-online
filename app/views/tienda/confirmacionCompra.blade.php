@extends('tienda.layout')

@section('contenido')

	@include('tienda.menu');

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-success" >
			  <div class="panel-heading text-center">
			    <h2>Compra éxitosa </h2>
			  </div>
			  <div class="panel-body">
			   	<h3>
			   		Su pedido ha sido realizado con éxito, proto te llegaran los productos a la puerta de tu casa
			   	</h3>
			  </div>    
			  <div class="panel-footer text-center"> Gracias por preferirnos </div>     
			</div>

		</div>
	</div>
@stop