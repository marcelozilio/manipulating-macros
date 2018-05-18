(function () {
    'use strict';
    angular.module('manipulating-macros').controller('DashboardController', DashboardController);
    DashboardController.$inject = ['DashBoardService', '$rootScope'];
    function DashboardController(DashBoardService, $rootScope) {
        var vm = this;
        
        activate();

        function activate() {

        }
    };
})();

(function () {
    'use strict';

    angular
        .module('app')
        .controller('HomeController', HomeController);

    HomeController.$inject = ['UserService', '$rootScope'];
    function HomeController(UserService, $rootScope) {
        var vm = this;


})();