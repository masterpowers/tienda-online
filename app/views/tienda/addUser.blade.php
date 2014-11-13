@extends('tienda.layout')

@section('contenido')
    
    <?php

    if ($user->exists):
        $form_data = array('route' => array('updateUsuario', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'guardarUsuario', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>
    @include('tienda.menu')
    <div class="col-md-6 col-md-offset-3">
    	@include('admin.users.formulario')
    </div>
@stop