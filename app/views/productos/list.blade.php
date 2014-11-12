@extends ('index')

@section ('title') Lista de productos @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <ol class="breadcrumb">
          <li>Inicio</li>
          <li>Productos</li>
        </ol>
        <h1>Lista de productos </h1>
        <a href="{{route('crearProducto')}}" class="btn btn-success glyphicon glyphicon-file"> Nuevo </a>
    </p>
  </div>
  <div class="panel-body">
 
    {{ $productos->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <tr>
        <th>Codigo</th>
        <th>Producto</th>
        <th>Descripcion</th>
        <th>Categoria</th> 
        <th>Unidad</th>
        <th>Minimo</th>
        <th>Cantidad</th>
        <th>Tipo</th>
        <th>Ubicacion</th>
        <th>Modelo</th>
        <th>Garantia</th>
        <th>Tiempo</th>
        <th>Opciones</th>
    </tr>
    @foreach ($productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>
            <a href="{{ route('productos-categoria', $producto->category->id) }}" > 
                {{ $producto->category->categoria }}
            </a>
        </td>
        <td>{{ $producto->unidad}}</td>
        <td>{{ $producto->minimo}}</td>
        <td>{{ $producto->compras()->sum('cantidad') - $producto->ventas()->sum('cantidad') }}</td>
        
        <td>{{ $producto->tipo}}</td>
        <td>{{ $producto->ubicacion}}</td>
        <td>{{ $producto->modelo}}</td>
        <td>{{ $producto->garantia}}</td>
        <td>{{ $producto->tiempo}}</td>
        <td>
            <a href="{{ route('editarProducto', $producto->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
             
            <a href="#" data-id="{{ $producto->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('deleteProducto', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




