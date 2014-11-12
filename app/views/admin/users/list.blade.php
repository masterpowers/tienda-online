@extends ('admin/layout')

@section ('title') Lista de Usuarios @stop

@section ('content')

  <h1>Lista de usuarios</h1>
  <p>
    <a href="{{ route('crearUsuario') }}" class="btn btn-primary">Crear un nuevo usuario</a>
  </p>
  {{ $users->links() }}
    <table class="table table-striped">
    <tr>
        <th>Nombre completo</th>
        <th>Correo electr&oacute;nico</th>
        <th>Acciones</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->full_name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <a href="{{ route('editarUsuario', $user->id) }}" class="btn btn-primary">
            Editar
          </a>
        </td>
    </tr>
    @endforeach
  </table>

@stop