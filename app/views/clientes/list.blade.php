@extends ('index')

@section ('title') Lista de Clientes @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <h1>Lista de Clientes </h1>
        <a href="{{route('crearCliente')}}" class="btn btn-success glyphicon glyphicon-file"> Nuevo </a>
        
    </p>
  </div>
  <div class="panel-body">
  
    {{ $clientes->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>DUI</th>
        <th>NIT</th>
        <th>Categoria</th>
        <th>Trabajo</th>
        <th>Tel. Trabajo</th>
        <th>Compras</th>
        <th>Productos</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($clientes as $cliente)
    <tr>
        <td>{{ $cliente->id }}</td>
        <td>{{ $cliente->nombre }}</td>
        <td>{{ $cliente->telefono}}</td>
        <td>{{ $cliente->direccion}}</td>
        <td>{{ $cliente->dui}}</td>
        <td>{{ $cliente->nit}}</td>
        <td>{{ $cliente->categoria}}</td>
        <td>{{ $cliente->trabajo}}</td>
        <td>{{ $cliente->telTrabajo}}</td>
        <td> 
            <a href="{{ route('productoCliente', [$cliente->id]) }}" >
                {{ $cliente->compras()->count() }}  
                <span class="badge"> ${{ $cliente->total()}}</span>
            </a>

        </td>
        <td> 
            <a href="{{ route('producto', ['cliente', $cliente->id]) }}" >
               Ver               
            </a>
        </td>
        <td>
            <a href="{{ route('editar-cliente', $cliente->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
             
            <a href="#" data-id="{{ $cliente->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
    </tbody>
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('eliminar-cliente', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




