@extends('tienda.layout')

@section('contenido')
	@include('tienda.menu')

	<div class="col-md-offset-4 col-md-4 ">
		@include('login.form')
	</div>
@stop