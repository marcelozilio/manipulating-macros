(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('RegistrarController', RegistrarController);
    
    RegistrarController.$inject = ['$location', '$rootScope', 'FlashService', '$http', 'ApplicationUtils', 'UserService'];
    function RegistrarController($location, $rootScope, FlashService, $http, ApplicationUtils, UserService) {
        var vm = this;
        vm.user = {};
        vm.register = register;
        
        function register() {
            vm.dataLoading = true;
            
            vm.user.calorias = ApplicationUtils.calculateCalories(vm.user);
            
            UserService.save(vm.user)
            .then(function (response){
                if (response.data == true) {
                    FlashService.Success('Usuário cadastrado com sucesso, faça login para continuar.', true);
                    $location.path('/login');
                } else {
                    FlashService.Error(response.data);
                    vm.dataLoading = false;
                }
            });
        }
    }
    
})();
