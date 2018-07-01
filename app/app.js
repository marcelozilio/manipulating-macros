(function () {
    'use strict';
    
    angular
    .module('macros', ['ngRoute', 'ngCookies'])
    .config(config)
    .run(run);
    
    config.$inject = ['$routeProvider', '$locationProvider'];
    function config($routeProvider, $locationProvider) {
        $routeProvider
        .when('/', {
            controller: 'HomeController',
            templateUrl: 'pages/home/home.html',
            controllerAs: 'vm'
        })
        .when('/add-alimentos', {
            controller: 'HomeController',
            templateUrl: 'pages/home/components/modal-add-alimento.html',
            controllerAs: 'vm'
        })
        .when('/login', {
            controller: 'LoginController',
            templateUrl: 'pages/login/login.html',
            controllerAs: 'vm'
        })
        .when('/registrar', {
            controller: 'RegistrarController',
            templateUrl: 'pages/registrar/registrar.html',
            controllerAs: 'vm'
        })
        .when('/alimentos', {
            controller: 'AlimentosController',
            templateUrl: 'pages/alimento/alimentos.html',
            controllerAs: 'vm'
        })
        .when('/configuracoes', {
            controller: 'ConfiguracoesController',
            templateUrl: 'pages/configuracoes/configuracoes.html',
            controllerAs: 'vm'
        })
        .when('/macros', {
            controller: 'MacrosController',
            templateUrl: 'pages/macros/macros.html',
            controllerAs: 'vm'
        })
        .when('/configuracoes/adicionar-peso', {
            controller: 'UsuarioPesoController',
            templateUrl: 'pages/configuracoes/add-peso/adicionar-peso.html',
            controllerAs: 'vm'
        })
        .when('/linha-tempo', {
            controller: 'LinhaTempoController',
            templateUrl: 'pages/linha-tempo/linha-tempo.html',
            controllerAs: 'vm'
        })
        .otherwise({ redirectTo: '/login' });
    }
    
    run.$inject = ['$rootScope', '$location', '$cookies', '$http'];
    function run($rootScope, $location, $cookies, $http) {
        $rootScope.globals = $cookies.getObject('globals') || {};
        if ($rootScope.globals.currentUser) {
            $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata;
        }
        
        $rootScope.$on('$locationChangeStart', function (event, next, current) {
            var restrictedPage = $.inArray($location.path(), ['/login', '/registrar']) === -1;
            var loggedIn = $rootScope.globals.currentUser;
            if (restrictedPage && !loggedIn) {
                $location.path('/login');
            }
        });
    }
    
})();