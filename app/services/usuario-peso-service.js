(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('UsuarioPesoService', UsuarioPesoService);
    
    UsuarioPesoService.$inject = ['ApplicationUtils'];
    function UsuarioPesoService(ApplicationUtils) {
        var request = {
            Find : Find,
            FindAll : FindAll,
            Save : Save,
            Delete : Delete
        }
        
        return request;
        
        function Find(id) {
            return ApplicationUtils.get('usuario-peso/find/' + id);
        }
        
        function FindAll() {
            return ApplicationUtils.get('usuario-peso/findAll');
        }
        
        function Save(usuarioPeso){
            return ApplicationUtils.post('usuario-peso/save', JSON.stringify(usuarioPeso));
        }
        
        function Delete(id) {
            return ApplicationUtils.get('usuario-peso/delete/' + id);
        }
    }
})();