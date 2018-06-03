(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('AlimentoService', AlimentoService);
    
    AlimentoService.$inject = ['ApplicationUtils'];
    function AlimentoService(ApplicationUtils) {
        var request = {
            FindAllCategorias : FindAllCategorias,
            FindAllAlimentos : FindAllAlimentos,
            FindAlimentosByCategoria : FindAlimentosByCategoria,
            FindOneAlimento : FindOneAlimento
        }
        
        return request;
        
        function FindAllAlimentos() {
            return ApplicationUtils.get('alimento/findAll');
        }
        
        function FindAlimentosByCategoria(id) {
            return ApplicationUtils.get('alimento/findByCategoria/' + id);
        }
        
        function FindOneAlimento(id) {
            return ApplicationUtils.get('alimento/find/' + id);
        }

        function FindAllCategorias() {
            return ApplicationUtils.get('categoria/findAll');
        }
    }
})();