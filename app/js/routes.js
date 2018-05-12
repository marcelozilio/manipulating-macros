(function () {
    'use strict';

    angular.module('manipulating-macros').config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                controller: 'DashboardController',
                templateUrl: 'pages/dashboard/dashboard.html',
                controllerAs: 'vm'
            })
            .when('/login', {
                controller: 'LoginController',
                templateUrl: 'pages/login/login.html',
                controllerAs: 'vm'
            })
            .when('/registrar', {
                controller: 'RegistrarController',
                templateUrl: 'pages/login/registrar.html',
                controllerAs: 'vm'
            });
    });
})();