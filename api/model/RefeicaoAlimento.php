<?php
/**
* Entidade referente o relacionamento de Refeição e Alimento.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 17/06/2018
*/
class RefeicaoAlimento
{
    private $id_refeicao_alimento;
    private $id_refeicao;
    private $id_alimento;
    private $data_refeicao;
    
    public function __construct()
    {
    }
    
    public function RefeicaoAlimento()
    {
    }
    
    public function __get($atrib)
    {
        return $this->$atrib;
    }
    
    public function __set($atrib, $valor)
    {
        $this->$atrib = $valor;
    }
    
    public function __toString()
    {
        return '{"id_refeicao_alimento":'.$this->id_refeicao_alimento.','.
            '"id_refeicao":'.$this->id_refeicao.','.
            '"id_alimento":'.$this->id_alimento.','.
            '"data_refeicao":"'.$this->data_refeicao.'"}';    
        }
    }