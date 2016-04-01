/**
 * Created by hellison on 30/03/16.
 */
var app = angular.module('indiqueApp', ['ngRoute'])
    .constant('API_URL', 'http://localhost/desenvolvimento/indique/public/api/');

app.config(['$routeProvider', '$locationProvider',
    function ($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'templates/index.html',
                controller: 'MainController'
            }).
            when('/cliente/add', {
                templateUrl: 'js/templates/cliente/add.html',
                controller: 'clienteCtrl'
            }).
            when('/clientes', {
                templateUrl: 'js/templates/cliente/list.html',
                controller: 'clienteCtrl'
            }).
            when('/cliente/edit/:clienteId', {
                templateUrl: 'js/templates/cliente/edit.html',
                controller: 'clienteCtrl'
            })
            //when('/cliente', {
            //    templateUrl: '../resources/views/partials/cliente/list.php',
            //    controller: 'clienteCtrl'
            //}).
            //when('/clienteAdd', {
            //    templateUrl: '../resources/views/partials/cliente/add.php',
            //    controller: 'clienteCtrl'
            //}).
            .otherwise({
                redirectTo: '/clientes'
            });
    }])

