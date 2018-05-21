(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('ConfiguracoesController', ConfiguracoesController);
    
    ConfiguracoesController.$inject = ['$rootScope', '$http'];
    function ConfiguracoesController($rootScope, $http) {
        var vm = this;
        vm.user = {};
    }
})();