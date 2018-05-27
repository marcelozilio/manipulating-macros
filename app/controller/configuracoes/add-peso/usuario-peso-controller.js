(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('UsuarioPesoController', UsuarioPesoController);
    
    UsuarioPesoController.$inject = ['$location', '$rootScope','ApplicationUtils'];
    function UsuarioPesoController($location, $rootScope, ApplicationUtils) {
        var vm = this;
        vm.user = {};
    
        initController();    
        function initController() {
    
        }
    }
})();