(function () {
    'use strict';
    
    angular
    .module('macros').controller('UsuarioPesoController', UsuarioPesoController);
    
    UsuarioPesoController.$inject = ['$rootScope','ApplicationUtils', 'UsuarioPesoService', 'FlashService'];
    function UsuarioPesoController($rootScope, ApplicationUtils, UsuarioPesoService, FlashService) {
        var vm = this;
        vm.userPeso = {};
        vm.save = save;
        
        function save(){
            vm.userPeso.id_usuario = $rootScope.globals.currentUser.id_usuario;
            vm.userPeso.dataPesagem = ApplicationUtils.formatDate(new Date());
            UsuarioPesoService.Save(vm.userPeso)
            .then(function (response){
                if (response.data == true) {
                    vm.userPeso = {};
                    FlashService.Success('Seu peso atual foi salvo com sucesso.\n\rVocê pode acompanhar seu progreso na linha do tempo.', true);
                } else {
                    FlashService.Error('Não foi possível salvar seu peso atual, tente novamente.', false);        
                }
            });
        }
        
    }
})();