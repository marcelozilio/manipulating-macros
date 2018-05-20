(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('HomeController', HomeController);
    
    HomeController.$inject = ['$rootScope', '$http'];
    function HomeController($rootScope, $http) {
        var vm = this;
        vm.user = null;
        
        initController();

        function initController() {
            loadCurrentUser();
        }
        
        function loadCurrentUser() {
            $http({
                method: 'GET',
                url: 'http://localhost/manipulating-macros/api/resources.php/usuario/find/'+$rootScope.globals.currentUser.id
            }).then(function (response) {
                vm.user = response.data;
            });
        }
    }
})();