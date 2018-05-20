(function () {
    'use strict';

    angular
        .module('macros')
        .controller('RegistrarController', RegistrarController);

        RegistrarController.$inject = ['$location', '$rootScope', 'FlashService', '$http', 'ApplicationUtils'];
    function RegistrarController($location, $rootScope, FlashService, $http, ApplicationUtils) {
        var vm = this;
        vm.user = {};
        vm.register = register;

        function register() {
            vm.dataLoading = true;
            
            vm.user.calorias = ApplicationUtils.calculateCalories(vm.user);

            $http({
                method: 'POST',
                url: 'http://localhost/manipulating-macros/api/resources.php/usuario/save',
                data: vm.user
            }).then(function (response) {
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
