(function () {
    'use strict';

    angular
        .module('macros')
        .controller('LoginController', LoginController);

    LoginController.$inject = ['$location', 'AuthenticationService', 'FlashService'];
    function LoginController($location, AuthenticationService, FlashService) {
        var vm = this;

        vm.login = login;

        (function initController() {
            AuthenticationService.ClearCredentials();
        })();

        function login() {
            vm.dataLoading = true;
            AuthenticationService.Login(vm.usuario, function (response) {
                if (response.data != false) {
                    AuthenticationService.SetCredentials(response);
                    $location.path('/');
                } else {
                    FlashService.Error('Usuário ou senha são inválidos.');
                    vm.dataLoading = false;
                }
            });
        };
    }

})();
