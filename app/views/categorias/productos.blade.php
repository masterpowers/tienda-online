@extends ('index')

@section ('title') Lista de categorias @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <ol class="breadcrumb">
          <li><a href="#">Inicio</a></li>
          <li><a href="{{route('categorias')}}">Categorías</a></li>
          <li class="active"> Productos</li>
        </ol>
        <h1>{{ $categoria->categoria }} <small> {{$categoria->descripcion }}</small></h1>
    </p>
  </div>
  <div class="panel-body">

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
    @foreach ($categoria->productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->category->categoria }}</td>
        <td>{{ $producto->unidad}}</td>
        <td>{{ $producto->minimo}}</td>
        <td>{{ $producto->compras()->sum('cantidad') - $producto->ventas()->sum('cantidad')}}</td>
        <td>{{ $producto->tipo}}</td>
        <td>{{ $producto->ubicacion}}</td>
        <td>{{ $producto->modelo}}</td>
        <td>{{ $producto->garantia}}</td>
        <td>{{ $producto->tiempo}}</td>
        <td>
            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
             
            <a href="#" data-id="{{ $producto->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


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




