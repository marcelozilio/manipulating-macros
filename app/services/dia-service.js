(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('DiaService', DiaService);
    
    DiaService.$inject = ['ApplicationUtils'];
    function DiaService(ApplicationUtils) {
        var request = {
            FindDiaByUsuario : FindDiaByUsuario
        }
        
        return request;
        
        function FindDiaByUsuario(id) {
            return ApplicationUtils.get('dia/findByUsuario/' + id);
        }
    }
})();