(function () {
    'use strict';

    angular.module('macros').factory('UsuarioService', UsuarioService);

    UserService.$inject = ['$http', 'HttpResquestService'];
    function UsuarioService($http, HttpResquestService) {
        var service = {};

        service.findAll = GetAll;
        service.findById = FindById;
        service.Save = Save;
        service.Update = Update;
        service.Delete = Delete;
        service.Autenticate = Autenticate;

        return service;

        function FindAll() {
            return HttpResquestService.get('usuario/findAll').then(handleSuccess, handleError('Erro ao buscar usuário.'));
        }

        function FindById(id) {
            return HttpResquestService.get('usuario/find' + id).then(handleSuccess, handleError('Erro ao buscar usuário.'));
        }

        function Save(user) {
            return HttpResquestService.post('usuario/save' + user).then(handleSuccess, handleError('Erro ao salvar usuário.'));
        }

        function Update(user) {
            return HttpResquestService.post('usuario/update' + user).then(handleSuccess, handleError('Erro ao alterar usuário.'));
        }

        function Delete(id) {
            return HttpResquestService.get('usuario/delete' + id).then(handleSuccess, handleError('Erro ao deletar usuário.'));
        }

        function Autenticate(user) {
            return HttpResquestService.post('usuario/autenticate' + user).then(handleSuccess, handleError('Erro ao buscar usuário.'));
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