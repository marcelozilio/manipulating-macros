(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('LinhaTempoController', LinhaTempoController);
    
    LinhaTempoController.$inject = ['$location', '$rootScope','ApplicationUtils'];
    function LinhaTempoController($location, $rootScope, ApplicationUtils) {
        var vm = this;
        vm.user = {};
    
        initController();    
        function initController() {
    
        }
    }
})();