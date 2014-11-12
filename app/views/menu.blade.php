@extends ('layout')


@section('menu')
<nav class="navbar-wrapper navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Configuración<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>{{ HTML::link('admin/categorias', 'Categorias'); }}</li>
                  <li>{{ HTML::link('admin/productos', 'Productos'); }}</li>
                   <li role="presentation" class="divider"></li>
                  <li>{{ HTML::link('admin/clientes', 'Clientes'); }}</li>
                  <li>{{ HTML::link('admin/proveedores', 'Proveedores'); }}</li>
                  <!-- <li>{{ HTML::link('admin/vendedores', 'Vendedores'); }}</li> -->
                   <li role="presentation" class="divider"></li>
                  <li>{{ HTML::link('admin/users', 'Usuarios'); }}</li>

                </ul>
              </li>
            <li>
                <a href="{{ route('compras')}}" ><span class="glyphicon glyphicon-shopping-cart"></span> Compras </a>
            </li>
                  
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-briefcase"></span> Ventas <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>{{ HTML::link('admin/ventas', 'Ventas'); }}</li>
                </ul>
              </li>


<!-- 
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-search"></span> Consultas <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>{{ HTML::link('consultas/compras', 'Consulta de Compras'); }}</li>
                  <li>{{ HTML::link('consultas/ventas', 'Consulta de Ventas'); }}</li>
                  <li>{{ HTML::link('consultas/producto', 'Entrada de productos'); }}</li>
                  <li><a href="{{Route('inventario')}}">Entrada y salida de inventario</a></li>

                </ul>
              </li> -->
              <li>
               {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
               <div class="form-group">
                   {{ Form::text('term', null, array('placeholder' => 'Buscar', 'class' => 'form-control')) }}
               </div> 
               <div class="btn-group">
                   {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-default', 'id'=>'buscar_info')) }}
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                       <span class="caret"></span>
                       <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <ul class="dropdown-menu" role="menu">
                       <li>{{ Form::radio('opciones', 'cliente', true) }} Cliente</li>
                       <li>{{ Form::radio('opciones', 'proveedor') }} Proveedor</li>
                       <li>{{ Form::radio('opciones', 'producto') }} Producto</li>
                       <li>{{ Form::radio('opciones', 'categoria') }} Categoría</li>
                       <li>{{ Form::radio('opciones', 'inventario') }} Inventario</li>
                   </ul>
               </div>
               {{ Form::close() }}

              </li>
              <li><a href="./login/logout"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
              
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
        </nav>

@stop

