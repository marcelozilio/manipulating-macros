﻿(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('UserService', UserService);
    
    UserService.$inject = ['ApplicationUtils'];
    function UserService(ApplicationUtils) {
        var request = {
            Find : Find,
            FindAll : FindAll,
            Save : Save,
            Delete : Delete,
            Update : Update,
            Autenticate : Autenticate
        }
        
        return request;
        
        function Find(id) {
            return ApplicationUtils.get('usuario/find/' + id);
        }
        
        function FindAll() {
            return ApplicationUtils.get('usuario/findAll');
        }
        
        function Save(user){
            return ApplicationUtils.post('usuario/save', JSON.stringify(user));
        }
        
        function Delete(id) {
            return ApplicationUtils.get('usuario/delete/' + id);
        }
        
        function Update(user){
            return ApplicationUtils.post('usuario/update', JSON.stringify(user));
        }
        
        function Autenticate(user){
            return ApplicationUtils.post('usuario/autenticate', JSON.stringify(user));
        }
    }
})();