@extends ('index')

@section ('title') Lista de categorias @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <h1>Lista de categorias </h1>
        <a href="{{route('crearCategoria')}}" class="btn btn-success glyphicon glyphicon-file"> Nuevo </a>
    </p>
  </div>
  <div class="panel-body">
 
    {{ $categorias->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Productos</th>
        <th>Opciones</th>
    </tr>
    @foreach ($categorias as $categoria)
    <tr>
        <td>{{ $categoria->id }}</td>
        <td>{{ $categoria->categoria }}</td>
        <td>{{ $categoria->descripcion }}</td>
        <td> <a href="{{ route('productos-categoria', $categoria->id) }}" class='btn btn-info'> 
                {{ $categoria->productos()->count() }}
             </a>
        </td>
        <td>
            <a href="{{ route('editar-categoria', $categoria->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
             
            <a href="#" data-id="{{ $categoria->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('eliminar-categoria', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




