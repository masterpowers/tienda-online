(function(){

	angular.module('tienda', ['ngCookies'])

	.controller('tiendaController', ['$cookieStore', '$scope', function($cookieStore, $scope){
		$scope.productos = [];

		function cargarCookie(){
			// $scope.productos = [{'id':1, 'nombre':'DVD Player'}]
			// $scope.productos = JSON.parse($cookieStore.get('oProductos') || '[]');
			return $cookieStore.get('oProductos') || '[]';
		}

		$scope.addProduct = function(id,nombre,precio){
			$scope.productos.push({id, nombre, precio});
			$cookieStore.put('oProductos', $scope.productos);
		}

		$scope.productos = cargarCookie();
		// cargarCookie();
	}])



})()