(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('RegistrarController', RegistrarController);
    
    RegistrarController.$inject = ['UsuarioService', '$location', '$rootScope'];
    function RegistrarController(UsuarioService, $location, $rootScope) {
        var vm = this;
        
        vm.register = register;
        
        function register() {
            vm.dataLoading = true;
            UsuarioService.Save(vm.usuario)
            .then(function (response) {
                if (response.success) {
                    alert('Registration successful');
                    $location.path('/login');
                } else {
                    alert(response.message);
                    vm.dataLoading = false;
                }
            });
        }
    }
    
});
