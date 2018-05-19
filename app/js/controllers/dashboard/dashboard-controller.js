(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('DashboardController', DashboardController);
    
    DashboardController.$inject = ['UsuarioService', '$rootScope'];
    function DashboardController(UsuarioService, $rootScope) {
        var vm = this;
    }
});