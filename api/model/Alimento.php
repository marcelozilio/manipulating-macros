<?php
/**
* Entidade referente ao Alimento.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 01/05/2018
*/
class Alimento
{
    private $id_alimento;
    private $id_categoria;
    private $descricao;
    private $proteina;
    private $carboidrato;
    private $lipideos;
    private $kcal;
    
    public function __construct()
    {
    }
    
    public function Alimento()
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