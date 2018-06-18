<?php
/**
* Entidade referente a Refeição.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 12/06/2018
*/
class Refeicao
{
    private $id_refeicao;
    private $id_dia;
    private $id_usuario;
    private $descricao;
    private $calorias;
    
    public function __construct()
    {
    }
    
    public function Refeicao()
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
        return '{"id_refeicao":'.$this->id_refeicao.','.
            '"id_dia":'.$this->id_dia.','.
            '"id_usuario":'.$this->peso.','.
            '"descricao":"'.$this->descricao.'",'.
            '"calorias":'.$this->calorias.'}';    
        }
    }