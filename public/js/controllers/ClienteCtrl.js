app.controller('clienteCtrl', function ($scope, $http, API_URL, $routeParams, $location) {

    $scope.newCliente = {}
    $scope.clientes = [];
    $scope.clienteId = $routeParams.clienteId;

    $http.get(API_URL + 'cliente').
        success(function (data) {
            $scope.clientes = data;
        });
    $http.get(API_URL + 'cliente/' + $scope.clienteId).
        success(function (data) {
            $scope.newCliente = data;
        });
    $scope.addCliente = function () {
        $http.post(API_URL + 'cliente', $scope.newCliente).
            success(function (data) {
                $scope.clientes.push(data);
                $location.path('/clientes');
            });
    }
    $scope.editCliente = function () {
        $http.put(API_URL + 'cliente/' + $scope.clienteId, $scope.newCliente).
            success(function () {
                $location.path('/clientes');
            });
    }
    $scope.removeCliente = function (cliente) {
        $http.delete(API_URL + 'cliente/' + cliente.id).
            success(function (data, status, headers, config) {
                for (index = 0; index < $scope.clientes.length; ++index) {
                    if ($scope.clientes[index].id == cliente.id) {
                        $scope.clientes.splice(index, 1);
                    }
                }
            });
    }
});