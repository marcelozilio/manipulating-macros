(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('MacrosService', MacrosService);
    
    MacrosService.$inject = ['ApplicationUtils'];
    function MacrosService(ApplicationUtils) {
        var request = {
            Find : Find,
            FindAll : FindAll,
            Save : Save,
            Delete : Delete,
            Update : Update,
            Calculate: Calculate
        }
        
        return request;
        
        function Find(id) {
            return ApplicationUtils.get('macros/find/' + id);
        }
        
        function FindAll() {
            return ApplicationUtils.get('macros/findAll');
        }
        
        function Save(macros){
            return ApplicationUtils.post('macros/save', JSON.stringify(macros));
        }
        
        function Delete(id) {
            return ApplicationUtils.get('macros/delete/' + id);
        }
        
        function Update(macros){
            return ApplicationUtils.post('macros/update', JSON.stringify(macros));
        }

        function Calculate(usuario){
            return ApplicationUtils.post('macros/calculate', JSON.stringify(usuario));
        }
    }
})();