(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('LinhaTempoService', LinhaTempoService);
    
    LinhaTempoService.$inject = ['ApplicationUtils'];
    function LinhaTempoService(ApplicationUtils) {
        var request = {
            Find : Find,
            FindAll : FindAll,
            Delete : Delete
        }
        
        return request;
        
        function Find(id) {
            return ApplicationUtils.get('usuario-peso/find/' + id);
        }
        
        function FindAll() {
            return ApplicationUtils.get('usuario-peso/findAll');
        }
        
        function Delete(id) {
            return ApplicationUtils.get('usuario-peso/delete/' + id);
        }
    }
})();