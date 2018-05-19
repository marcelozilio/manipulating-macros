(function () {
    'use strict';
    angular.module('macros').controller('LoginController', LoginController);
    LoginController.$inject = ['$location', 'AuthenticationService'];
    function LoginController($location, AuthenticationService) {
        var vm = this;
        vm.login = login;

        (function initController() {
            AuthenticationService.ClearCredentials();
        })();

        function login() {
            AuthenticationService.Login(vm.usuario, function (response) {
                if (response.success) {
                    AuthenticationService.SetCredentials(vm.usuario);
                    $location.path('/');
                } else {
                    alert(response.error);
                }
            });
        };
    }
});
