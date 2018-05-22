<?php
require_once 'persistence/ConnectionDataBase.php';
require_once 'interface/IRepository.php';
require_once 'model/Usuario.php';
/**
* Classe responsável pela persistência de usuários no banco de dados.
*
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 01/05/2018
*/
class UsuarioRepository implements IRepository
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDataBase::getConnection();
    }

    public function save($object)
    {
        try {
            $stat=$this->connection->prepare("INSERT INTO USUARIO(ID_USUARIO,EMAIL,NOME,ALTURA,PESO,IDADE,SEXO,CALORIAS,OBJETIVO,SENHA)values(null,?,?,?,?,?,?,?,?,?)");
            $stat->bindValue(1, $object->email);
            $stat->bindValue(2, $object->nome);
            $stat->bindValue(3, $object->altura);
            $stat->bindValue(4, $object->peso);
            $stat->bindValue(5, $object->idade);
            $stat->bindValue(6, $object->sexo);
            $stat->bindValue(7, $object->calorias);
            $stat->bindValue(8, $object->objetivo);
            $stat->bindValue(9, $object->senha);
            $stat->execute();
            return true;
        } catch (Exception $ex) {
            throw new Exception('Erro ao incluir registro.'.$ex);
        }
    }

    public function find($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM USUARIO WHERE ID_USUARIO = $id");
            $usuario = $stat->fetchObject('Usuario');
            return $usuario;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível buscar o usuário');
        }
    }

    public function findAll()
    {
        try {
            $stat = $this->connection->query("SELECT * FROM USUARIO");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_OBJ);
            $this->connection = null;
            return $array;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível buscar os usuários');
        }
    }

    public function delete($id)
    {
        try {
            $stat = $this->connection->prepare("DELETE FROM USUARIO WHERE ID_USUARIO=?");
            $stat->bindValue(1, $id);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $e) {
            throw new Exception('Não foi possível excluir o registro.');
        }
    }

    public function update($object)
    {
        try {
            $stat=$this->connection->prepare("UPDATE USUARIO SET EMAIL=?,NOME=?,ALTURA=?,PESO=?,IDADE=?,SEXO=?,CALORIAS=?,OBJETIVO=?,SENHA=? WHERE ID_USUARIO = ?");
            
            $stat->bindValue(1, $object->email);
            $stat->bindValue(2, $object->nome);
            $stat->bindValue(3, $object->altura);
            $stat->bindValue(4, $object->peso);
            $stat->bindValue(5, $object->idade);
            $stat->bindValue(6, $object->sexo);
            $stat->bindValue(7, $object->calorias);
            $stat->bindValue(8, $object->objetivo);
            $stat->bindValue(9, $object->senha);
            $stat->bindValue(10, $object->id_usuario);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível alterar o registro.'.$ex);
        }
    }

    public function autenticate($object)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM USUARIO WHERE EMAIL='$object->email' AND SENHA='$object->senha'");
            $usuario = $stat->fetchObject('Usuario');
            return $usuario;
        } catch (Exception $e) {
            return false;
        }
    }
}