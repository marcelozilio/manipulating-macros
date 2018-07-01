(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('HomeController', HomeController);
    
    HomeController.$inject = ['$rootScope', 'UserService', 'DiaService'];
    function HomeController($rootScope, UserService, DiaService) {
        var vm = this;
        vm.user = null;
        vm.dia = {ID_DIA : 0};
        vm.refeicoes = [];
        vm.alimentos = undefined;
        
        initController();
        
        function initController() {            
            loadCurrentUser();
            loadLastDay();
            loadAlimentos();   
        }
        
        function loadLastDay() {
            DiaService.FindDiaByUsuario($rootScope.globals.currentUser.id_usuario)
            .then(function (response){
                if(response.data !== false) {
                    vm.dia = response.data;
                    loadRefeicoesOfDay();
                } else {
                    var dia = {
                        ID_USUARIO : $rootScope.globals.currentUser.id_usuario,
                        DESCRICAO : '',
                        DATA_DIA : new Date(),
                        CALORIAS_TOTAIS_DIA : 0
                    }
                    DiaService.SaveDia(dia);
                    loadLastDay();
                }
            });
        }
        
        function loadRefeicoesOfDay() {
            DiaService.FindRefeicoesByDia(vm.dia.ID_DIA)
            .then(function (response) {
                if (response.data.length !== 0) {
                    vm.refeicoes = response.data;                    
                } else {            
                    DiaService.SaveRefeicoes(vm.dia.ID_DIA);
                    loadRefeicoesOfDay();
                }
            });
        }
        
        function loadAlimentos() {
            DiaService.FindAllAlimentos()
            .then(function (response){
                vm.alimentos = response.data;
            });            
        }
        
        function loadCurrentUser() {
            UserService.Find($rootScope.globals.currentUser.id_usuario)
            .then(function (response) {
                vm.user = response.data;
            });
        }
    }
})();