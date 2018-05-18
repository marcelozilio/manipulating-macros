(function () {
    'use strict';

    angular.module('manipulating-macros').factory('UserService', UserService);

    UserService.$inject = ['$http'];
    function UserService($http) {
        var service = {};

        service.findAll = GetAll;
        service.findById = GetById;
        service.Save = Save;
        service.Update = Update;
        service.Delete = Delete;

        return service;

        function FindAll() {
            return null;
        }

        function FindById(id) {
            return null;
        }

        function Save(user) {
            return null;
        }

        function Update(user) {
            return null;
        }

        function Delete(id) {
            return null;
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

})();
