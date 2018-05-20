(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('ApplicationUtils', ApplicationUtils);
    
    ApplicationUtils.$inject = ['$http'];
    function ApplicationUtils($http) {
        var utils = {};
        
        utils.formatDate = formatDate;
        utils.calculateCalories = calculateCalories;
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
        
        function calculateCalories(usuario) {
            var tmb = ((10*usuario.peso) + (6.25*usuario.altura)) - (5*usuario.idade);
            
            usuario.sexo == 'Masculino' ? tmb += 5 : tmb -= 161;
            
            tmb *= 1.2;            
            if (usuario.objetivo == 'cutting') {
                return tmb - 500;
            } else if (usuario.objetivo == 'bulking') {
                return tmb + 500;
            } else {
                return tmb;
            }    
        }        
    }
})();