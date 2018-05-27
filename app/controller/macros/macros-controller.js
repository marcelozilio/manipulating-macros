(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('MacrosController', MacrosController);
    
    MacrosController.$inject = ['$rootScope', '$http', 'FlashService', 'MacrosService'];
    function MacrosController($rootScope, $http, FlashService, MacrosService) {
        var vm = this;
        vm.macros = {};
        vm.update = update;

        initController();
        
        function initController(){
            MacrosService.Find($rootScope.globals.currentUser.id_usuario)
            .then(function (response) {   
                if (response.data !== false) {
                    vm.macros = response.data;
                } else {
                    MacrosService.Calculate($rootScope.globals.currentUser)
                    .then(function (response){
                        vm.macros = response.data;
                    });
                }
                vm.macros.CALORIAS = $rootScope.globals.currentUser.calorias;
            });
        }

        function update() {
            MacrosService.Update(vm.macros)
            .then(function (response){
                if(response.data == true){
                    FlashService.Success('Macros atualizados.', true);
                } else {
                    FlashService.Success(response.data, false);
                }                
            });
        }
    }
})();