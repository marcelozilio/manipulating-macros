<?php
/**
* Entidade referente ao Dia.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 30/06/2018
*/
class Dia
{
    private $id_dia;
    private $id_usuario;
    private $descricao;
    private $data_dia;
    private $calorias_totais_dia;
    
    public function __construct()
    {
    }
    
    public function Dia()
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
}