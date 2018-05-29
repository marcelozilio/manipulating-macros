(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('LinhaTempoController', LinhaTempoController);
    
    LinhaTempoController.$inject = ['$rootScope','ApplicationUtils', 'LinhaTempoService'];
    function LinhaTempoController($rootScope, ApplicationUtils,LinhaTempoService) {
        var vm = this;
        vm.userPesos = [];
    
        initController();
        
        function initController() {
            LinhaTempoService.Find($rootScope.globals.currentUser.id_usuario)
            .then(function (response){
                vm.userPesos = response.data;
            });
        }
    }
})();