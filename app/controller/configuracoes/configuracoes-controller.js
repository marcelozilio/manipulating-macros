(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('ConfiguracoesController', ConfiguracoesController);
    
    ConfiguracoesController.$inject = ['$location', '$rootScope', 'FlashService', '$http', 'ApplicationUtils', 'UserService'];
    function ConfiguracoesController($location, $rootScope, FlashService, $http, ApplicationUtils, UserService) {
        var vm = this;
        vm.user = {};
        vm.update = update;

        initController();
        
        function update() {
            vm.dataLoading = true;
            UserService.Update(vm.user)
            .then(function (response) {
                if (response.data == true) {
                    ApplicationUtils.updateCurrentUser(vm.user);
                    FlashService.Success('Usuário alterado com sucesso.', true);
                    $location.path('/');
                } else {
                    FlashService.Error(response.data);
                    vm.dataLoading = false;
                }
            });
        }
        
        function initController() {
            loadCurrentUser();        
        }
        
        function loadCurrentUser() {
            vm.user = $rootScope.globals.currentUser;
        }
    }
})();