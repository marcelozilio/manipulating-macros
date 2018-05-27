(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('HomeController', HomeController);
    
    HomeController.$inject = ['$rootScope', '$http', 'UserService'];
    function HomeController($rootScope, $http, UserService) {
        var vm = this;
        vm.user = null;
        
        initController();
        
        function initController() {
            loadCurrentUser();
        }
        
        function loadCurrentUser() {
            UserService.Find($rootScope.globals.currentUser.id_usuario)
            .then(function (response) {
                vm.user = response.data;
            });
        }
    }
})();