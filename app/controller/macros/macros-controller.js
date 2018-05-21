(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('MacrosController', MacrosController);
    
    MacrosController.$inject = ['$rootScope', '$http'];
    function MacrosController($rootScope, $http) {
        var vm = this;
        vm.macros = {};

        function calculateCaloriesPerMacros() {
            
        }
    }
})();