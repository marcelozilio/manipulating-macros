(function () {
    'use strict';
    
    angular
    .module('macros')
    .controller('AlimentosController', AlimentosController);
    
    AlimentosController.$inject = ['$rootScope', '$http', 'AlimentoService'];
    function AlimentosController($rootScope, $http, AlimentoService) {
        var vm = this;
        vm.alimentos = [];
        vm.alimentosModalAdd = [];
        vm.categorias = {};
        vm.loadAlimentos = loadAlimentos;
        
        initController();
        
        function initController(){
            AlimentoService.FindAllAlimentos()
            .then(function (response){
                vm.alimentosModalAdd = response.data;
            });
            
            AlimentoService.FindAllCategorias()
            .then(function (response){
                vm.categorias = response.data;
            });
        }
        
        function loadAlimentos($id){
            AlimentoService.FindAlimentosByCategoria($id)
            .then(function (response){
                vm.alimentos = response.data;
            });
        }
        
    }
})();