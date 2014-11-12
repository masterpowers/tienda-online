@extends ('index')

@section ('title') Lista de productos @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <ol class="breadcrumb">
          <li>Inicio</li>
          <li>Inventario</li>
        </ol>
        <h1>Inventario de productos </h1>
        {{ HTML::link('productos/create', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
    </p>
  </div>
  <div class="panel-body">
 
    {{ $productos->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <tr>
        <th>Codigo</th>
        <th>Producto</th>
        <th>Categoria</th> 
        <th>Ventas</th> 
        <th>Compras</th> 
        <th>Envíos</th> 
        <th class="text-center"> Cantidad</th>
    </tr>
    @foreach ($productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->nombre }}</td>
        <td>
            <a href="{{ route('productos-categoria', $producto->category->id) }}" > 
                {{ $producto->category->categoria }}
            </a>
        </td>
        <td >
            {{$producto->ventas->sum('cantidad')}}
        </td>
        <td>
            {{$producto->compras->sum('cantidad')}}
        </td>
        <td>
            {{$producto->envios->sum('cantidad')}}
        </td>
        <td class="success text-center">{{ $producto->compras()->sum('cantidad') - $producto->ventas()->sum('cantidad') - $producto->envios()->sum('cantidad')}}</td>
        
    </tr>

    @endforeach
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('productos.destroy', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




