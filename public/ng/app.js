var app = angular.module("myApp", ["ngRoute"]);

app.config(['$interpolateProvider', '$routeProvider','$locationProvider',
    function ($interpolateProvider, $routeProvider,$locationProvider) {

        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');

        $routeProvider
            .when("/", {
                templateUrl : "templates/dashboard/home",
                controller : "MapCtrl"
            })
            .when("/home", {
                templateUrl : "templates/dashboard/home",
                controller : "MapCtrl"
            })
            .when("/activation", {
                templateUrl : "templates/dashboard/activation",
                controller : "MapCtrl"
            })
            .when("/current", {
                templateUrl : "templates/dashboard/current",
                controller : "currentController"
            });


    }]);
