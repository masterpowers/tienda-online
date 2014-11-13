<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
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
                    <li>
                        <a href="#">Nosotros</a>
                    </li>
                    <li>
                        <a href="#">Servicios</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                </ul>

           
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{Auth::user()->full_name}}<span class="caret">  </span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::user()->tipo == 'Administrador')
                            <li><a href="{{route('admin')}}"><span class="glyphicon glyphicon-home"></span> Admin</a></li>
                        @endif
                      <li><a href="{{route('editUser', Auth::user()->id)}}"><span class="glyphicon glyphicon-pencil"></span>  Editar</a></li>
                      <li class="divider"></li>
                      <li><a href="{{route('logOut')}}"><span class="glyphicon glyphicon-off"></span>  Cerrar Sessión</a></li>
                    </ul>
                  </li>
                @else
                    <li> <a href="{{url('/login')}}">Iniciar Sesión</a></li>
                    <li> <a href="{{route('addUser')}}">Crear Cuenta</a></li>
                @endif
            </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>