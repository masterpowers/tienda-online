@extends ('./admin/layout')

<?php

    if ($user->exists):
        $form_data = array('route' => array('updateUsuario', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'guardarUsuario', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') {{ $action }} Usuarios @stop

@section ('content')

  <h1>{{ $action }} Usuarios</h1>

  <p>
    <a href="{{ route('usuarios') }}" class="btn btn-info">Lista de usuarios</a>
  </p>

  @include('admin.users.formulario')

@stop