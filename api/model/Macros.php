<?php
/**
* Entidade referente ao Macros.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 05/05/2018
*/
class Macros
{
    private $id_macros;
    private $id_usuario;
    private $proteina;
    private $carboidrato;
    private $gordura;
    
    public function __construct()
    {
    }
    
    public function Macros()
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
        return '{"id_macros":'.$this->id_macros.','. 
            '"id_usuario":'.$this->id_usuario.','.
            '"proteina":'.$this->proteina.','.
            '"carboidrato":'.$this->carboidrato.','.
            '"gordura":'.$this->gordura.'}';
        }
    }