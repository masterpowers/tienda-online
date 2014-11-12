@extends ('index')

@section ('title') Lista de vendedores @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <h1>Lista de vendedores </h1>
        {{ HTML::link('vendedores/create', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
    </p>
  </div>
  <div class="panel-body">
 
    {{ $vendedores->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>DUI</th>
        <th>NIT</th>
        <th>Opciones</th>
    </tr>
    @foreach ($vendedores as $vendedor)
    <tr>
        <td>{{ $vendedor->id }}</td>
        <td>{{ $vendedor->nombre }}</td>
        <td>{{ $vendedor->telefono}}</td>
        <td>{{ $vendedor->direccion}}</td>
        <td>{{ $vendedor->dui}}</td>
        <td>{{ $vendedor->nit}}</td>
        <td>
            <a href="{{ route('vendedores.edit', $vendedor->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
             
            <a href="#" data-id="{{ $vendedor->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('vendedores.destroy', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




