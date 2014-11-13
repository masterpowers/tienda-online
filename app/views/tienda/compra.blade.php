
<body ng-controller='tiendaController'>

    <!-- Navigation -->
    @include('tienda.menu')

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-3">
            <div  style="position:fixed">
                <div class="panel panel-success"  ng-show='productos.length'>
                  <div class="panel-heading text-center">
                    Tu compra
                  </div>
                  <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Producto</th>
                            <th>cantidad</th> 
                            <th>Total</th>                            
                        </thead>
                        <tbody>
                            <tr ng-repeat="producto in productos track by $index">
                                <td >
                                    @{{producto.nombre}}
                                </td>
                                <td>
                                    @{{producto.cantidad}}
                                </td>
                                <td>
                                    @{{(producto.cantidad * producto.precio) | currency}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  </div>    
                  <div class="panel-footer text-center"> <a class="btn btn-success" ng-click='saveBuy()'> Revisar & pagar</a> </div>     
                </div>


               <!--  <p class="lead">Nombre de tienda</p> -->
                <div class="list-group">

                    @foreach($categorias as $categoria)
                        <a href="{{route('tiendaProductos', $categoria->id)}}" class="list-group-item">{{$categoria->categoria}}</a>
                    @endforeach
                  <!--   <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a> -->
                </div>
            </div>
            </div>

            <div class="col-md-9">
                <div class="row">


                    @foreach($productos as $producto)
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="{{url('/')}}/img/320x150.gif" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$ {{$producto->precio}}</h4>
                                    <h4><a href="#">{{$producto->nombre}}</a>
                                    </h4>
                                    <p>{{$producto->descripcion}}</a>.</p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">15 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </p>
                                    <p class="text-center">
                                        <a href="#" class="btn btn-primary" ng-click="addProduct({{$producto->id}}, '{{$producto->nombre}}', '{{$producto->precio}}')">Add Car</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container text-center">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Sitio web 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->