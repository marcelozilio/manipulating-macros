(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('ApplicationUtils', ApplicationUtils);
    
    ApplicationUtils.$inject = ['$http', '$rootScope'];
    function ApplicationUtils($http, $rootScope) {
        var httpUtils = {
            defaultHeader : 'Content-Type:application/x-www-form-urlencoded; charset=UTF-8',
            urlWS : 'http://localhost/manipulating-macros/api/resources.php/'
        }
        
        var utils = {
            formatDate : formatDate,
            post : postRequest,
            get : getRequest,
            updateCurrentUser : UpdateCurrentUser
        };
        
        return utils;
        
        function formatDate (data){
            var dia = data.getDate();
            
            if (dia.toString().length == 1) {
                dia = "0" + dia;    
            }
            
            var mes = data.getMonth() + 1;
            if (mes.toString().length == 1) {
                mes = "0" + mes;
                
            }
            var ano = data.getFullYear(); 
            return  ano + "-" + mes + "-" + dia;
        }
        
        function postRequest (urlPath, data) {
            return $http({
                method: 'POST',
                headers: httpUtils.defaultHeader,
                url: httpUtils.urlWS + urlPath,
                data: data || {}
            });
        }
        
        function getRequest (urlPath, data) {
            return $http({
                method: 'GET',
                headers: httpUtils.defaultHeader,
                url: httpUtils.urlWS + urlPath
            });
        }
        
        function UpdateCurrentUser(usuario) {
            $rootScope.globals = {
                currentUser: {
                    id_usuario: usuario.id_usuario,
                    nome: usuario.nome,
                    email: usuario.email,
                    altura: usuario.altura,
                    peso: usuario.peso,
                    idade: usuario.idade,
                    sexo: usuario.sexo,
                    calorias: usuario.calorias,
                    objetivo: usuario.objetivo,
                    senha: usuario.senha
                }
            };          
        }
    }
})();