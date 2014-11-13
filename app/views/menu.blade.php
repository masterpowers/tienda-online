@extends ('layout')


@section('menu')
<nav class="navbar-wrapper navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{url('/')}}">Tienda Online</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Configuración<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{route('categorias')}}">Categorias</a> </li>
                  <li><a href="{{route('productos')}}">Productos</a> </li>
                  <!-- <li><a href="{{route('clientes')}}">Clientes</a></li> -->
                  <li><a href="{{route('proveedores')}}">Proveedores</a> </li>
                  <!-- <li>{{ HTML::link('admin/vendedores', 'Vendedores'); }}</li> -->
                   <li role="presentation" class="divider"></li>
                  <li><a href="{{route('usuarios')}}">Usuarios | Cliente</a></li>

                </ul>
              </li>
            <li>
                <a href="{{ route('compras')}}" ><span class="glyphicon glyphicon-shopping-cart"></span> Compras </a>
            </li>
                  
              <li class="dropdown">
                <a href="{{ route('ventas')}}"><span class="glyphicon glyphicon-briefcase"></span> Ventas </a>
                
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
            <!--   <li>
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

              </li> -->
              <li class="pull-right "><a href="{{route('logOut')}}"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
              
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
        </nav>

@stop

