(function(){

	angular.module('tienda', ['ngCookies'])

	.controller('tiendaController', ['$window', '$scope', 'saveCompra', '$log', function ($window, $scope, saveCompra, $log){
		$scope.productos = [];

		function cargarCookie(){
			return ($window.localStorage['iProductos'] || '[]');
		}

		$scope.addProduct = function ( id, nombre, precio){
			cantidad = 1;
			for (var i = $scope.productos.length - 1; i >= 0; i--) {
				if($scope.productos[i].id == id)
				{
					cantidad  += $scope.productos[i].cantidad;
					$scope.productos[i].cantidad = cantidad;
				}
			};

			if(cantidad == 1)
 				$scope.productos.push({id, nombre, cantidad, precio});

			$window.localStorage['iProductos'] = JSON.stringify($scope.productos)
			// $cookieStore.put('iProductos',  JSON.stringify($scope.productos));
		}

		$scope.saveBuy = function (){
			saveCompra.save($scope.productos)
			.then( function (data){
				$log.info('guarndao')
				$log.info(data)
				if(data == 201){
					$window.localStorage['iProductos'] = '';
					cargarProductos(cargarCookie())	
					window.location.href = "http://localhost/marvin/public/finalizar-compra"
				}else{
					window.location.href = "http://localhost/marvin/public/login"
				}
			})

		}

		function cargarProductos(data){
			$scope.productos = JSON.parse(data)
		}

		cookie = cargarCookie();
		cargarProductos(cookie);
	}])

	.factory('saveCompra', ['$http', '$q', function ( $http, $q){
		function save(data){
			difer = $q.defer();
			$http.post('http://localhost/marvin/public/guardarcompra', data)
			.success( function (data, status){
				difer.resolve(status);
			})
			.error ( function (data){
				difer.reject();
			})
			return difer.promise;
		}

		return {
			save:save
		}

	}])



})()