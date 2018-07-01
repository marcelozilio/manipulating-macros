(function () {
    'use strict';
    
    angular
    .module('macros')
    .factory('DiaService', DiaService);
    
    DiaService.$inject = ['ApplicationUtils'];
    function DiaService(ApplicationUtils) {
        var request = {
            FindDiaByUsuario : FindDiaByUsuario,
            SaveDia : SaveDia,
            FindRefeicoesByDia : FindRefeicoesByDia,
            SaveRefeicoes : SaveRefeicoes,
            FindAllAlimentos : FindAllAlimentos
        }
        
        return request;
        
        function FindDiaByUsuario(id) {
            return ApplicationUtils.get('dia/find/' + id);
        }

        function SaveDia(dia) {
            dia.DATA_DIA = ApplicationUtils.formatDate(dia.DATA_DIA);
            return ApplicationUtils.post('dia/save', JSON.stringify(dia));
        }

        function SaveRefeicoes(id) {
            return ApplicationUtils.get('refeicao/saveRefeicoesFromDiario/' + id);
        }

        function FindRefeicoesByDia(id) {
            return ApplicationUtils.get('refeicao/findRefeicoesByDia/' + id);
        }
        
        function FindAllAlimentos() {
            return ApplicationUtils.get('alimento/findAll');
        }

    }
})();