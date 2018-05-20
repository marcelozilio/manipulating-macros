﻿(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('UsuarioService', UsuarioService);
    
    UsuarioService.$inject = ['$http'];
    function UsuarioService($http) {
        var service = {};
        
        service.findAll = GetAll;
        service.findById = FindById;
        service.Save = Save;
        service.Update = Update;
        service.Delete = Delete;
        service.Autenticate = Autenticate;
        
        return service;
        
        function FindAll() {
            return $http.get('usuario/findAll').then(handleSuccess, handleError('Erro ao buscar usuário.'));
        }
        
        function FindById(id) {
            return $http.get('usuario/find' + id).then(handleSuccess, handleError('Erro ao buscar usuário.'));
        }
        
        function Save(user) {
            return $http.post('usuario/save' + user).then(handleSuccess, handleError('Erro ao salvar usuário.'));
        }
        
        function Update(user) {
            return $http.post('usuario/update' + user).then(handleSuccess, handleError('Erro ao alterar usuário.'));
        }
        
        function Delete(id) {
            return $http.get('usuario/delete' + id).then(handleSuccess, handleError('Erro ao deletar usuário.'));
        }
        
        function Autenticate(user) {
            return $http.post('http://localhost/manipulating-macros/api/resources.php/usuario/autenticate' + user).then(handleSuccess, handleError('Erro ao buscar usuário.'));
        }
        
        // private functions
        
        function handleSuccess(res) {
            return res.data;
        }
        
        function handleError(error) {
            return function () {
                return { success: false, message: error };
            };
        }
    }
});