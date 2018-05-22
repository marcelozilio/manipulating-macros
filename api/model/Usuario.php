<?php
/**
* Entidade referente ao Usuário.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 01/05/2018
*/
class Usuario
{
    private $id_usuario;
    private $email;
    private $nome;
    private $altura;
    private $peso;
    private $idade;
    private $sexo;
    private $calorias;
    private $objetivo;
    private $senha;
    
    public function __construct()
    {
    }
    
    public function Usuario()
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
        return '{"id_usuario":'.$this->id_usuario.','.
            '"email":"'.$this->email.'",'.
            '"nome":"'.$this->nome.'",'.
            '"altura":'.$this->endereco.','.
            '"peso":'.$this->peso.','.
            '"idade":'.$this->idade.','.
            '"sexo":"'.$this->sexo.'",'.
            '"calorias":'.$this->calorias.','.
            '"objetivo":"'.$this->objetivo.'",'.
            '"senha":"'.$this->senha.'"}';    
        }
    }