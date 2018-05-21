(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('AlimentosController', AlimentosController);
    
    AlimentosController.$inject = ['$rootScope', '$http'];
    function AlimentosController($rootScope, $http) {
        var vm = this;
        vm.alimentos = [];
    }
})();