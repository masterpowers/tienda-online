@extends ('index')

@section ('title') Lista de compras @stop

@section ('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <p>
        <h1>Lista de compras </h1>
        {{ HTML::link('compras/create', 'Nuevo', array('class' => 'glyphicon glyphicon-file'))}}
    </p>
  </div>
  <div class="panel-body">
 
    {{ $compras->links()}} 

  <table class="table table-striped table-condensed table-hover">
    <thead>
    <tr>
        <th>Codigo</th>
        <th>Proveedor</th>
        <th>Comprobante</th>
        <th>Fecha</th>
        <th>Creado</th>
        <th>Modificado</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($compras as $compra)
    <tr>
        <td>{{ $compra->id }}</td>
        <td>{{ $compra->idProveedor }}</td>
        <td>{{ $compra->comprobante }}</td>
        <td>{{ $compra->fecha}}</td>
        <td>{{ $compra->created_at}}</td>
        <td>{{ $compra->updated_at}}</td>
        <td>
            <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn-primary glyphicon glyphicon-edit"> </a>
            <a href="{{ route('compras.show', $compra->id) }}" class="btn btn-primary glyphicon glyphicon-search"> </a>
             
            <a href="#" data-id="{{ $compra->id }}" class="btn btn-danger btn-delete glyphicon glyphicon-remove"> </a>


        </td>
    </tr>

    @endforeach
    </tbody>
  </table>
</div>
</div>

{{--usado para eliminar usuario --}}
{{ Form::open(array('route' => array('compras.destroy', 'CLIENTE_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}
@stop




