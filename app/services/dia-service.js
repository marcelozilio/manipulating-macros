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
            FindAllAlimentos : FindAllAlimentos,
            SaveRefeicaoAlimento : SaveRefeicaoAlimento,
            FindRefeicaoAlimento : FindRefeicaoAlimento,
            DeleteRefeicaoAlimento : DeleteRefeicaoAlimento
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

        function SaveRefeicaoAlimento(refeicaoAlimento) {    
            return ApplicationUtils.post('refeicao-alimento/save', JSON.stringify(refeicaoAlimento));
        }

        function FindRefeicaoAlimento(idRefeicao) {    
            return ApplicationUtils.get('refeicao-alimento/findByRefeicao/'+ idRefeicao);
        }

        function DeleteRefeicaoAlimento(id) {
            return ApplicationUtils.get('refeicao-alimento/delete/' + id);
        }
    }
})();