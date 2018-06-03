<?php
/**
* Entidade referente a Categoria.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 02/06/2018
*/
class Categoria
{
    private $id_categoria;
    private $descricao;

    public function __construct()
    {
    }
    
    public function Categoria()
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