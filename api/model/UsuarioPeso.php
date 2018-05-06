<?php
/**
* Entidade referente ao Peso do Usuário.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 05/05/2018
*/
class UsuarioPeso
{
    private $id_usuarioPeso;
    private $id_usuario;
    private $peso;
    private $dataPesagem;
    
    public function __construct()
    {
    }
    
    public function UsuarioPeso()
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
        return '{"id_usuarioPeso":'.$this->id_usuarioPeso.','. 
            '"id_usuario":'.$this->id_usuario.','.
            '"peso":'.$this->peso.','.
            '"dataPesagem":"'.$this->dataPesagem.'"}';
        }
    }