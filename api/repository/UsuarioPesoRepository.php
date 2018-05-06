<?php
require_once 'persistence/ConnectionDataBase.php';
require_once 'interface/IRepository.php';
require_once 'model/UsuarioPeso.php';
/**
* Classe responsável pela persistência do peso do usuário no banco de dados.
*
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 05/05/2018
*/
class UsuarioPesoRepository implements IRepository
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDataBase::getConnection();
    }

    public function save($object)
    {
        try {
            $stat=$this->connection->prepare("INSERT INTO USUARIO_PESO(ID_USUARIO_PESO,ID_USUARIO,PESO,DATA_PESAGEM)values(null,?,?,?)");
            
            $stat->bindValue(1, $object->id_usuario);
            $stat->bindValue(2, $object->peso);
            $stat->bindValue(3, $object->dataPesagem);
            $stat->execute();
            $this->connection = null;
            return 'Registro Incluído.';
        } catch (Exception $ex) {
            throw new Exception('Erro ao incluir registro.');
        }
    }

    /**
     * Busca todos os registro de pesagem do usuário.
     * 
     * @param $id Identificador do usuário
     */
    public function find($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM USUARIO_PESO WHERE ID_USUARIO = $id");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_OBJ);
            $this->connection = null;
            return $array;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível buscar os registros de pesagem do usuário.');
        }
    }

    public function findAll()
    {
        try {
            $stat = $this->connection->query("SELECT * FROM USUARIO_PESO");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_OBJ);
            $this->connection = null;
            return $array;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível buscar os registros');
        }
    }

    public function delete($id)
    {
        try {
            $stat = $this->connection->prepare("DELETE FROM USUARIO_PESO WHERE ID_USUARIO_PESO=?");
            $stat->bindValue(1, $id);
            $stat->execute();
            $this->connection = null;
            return 'Registro Excluído.';
        } catch (Exception $e) {
            throw new Exception('Não foi possível excluir o registro.');
        }
    }

    public function update($object)
    {
        try {
            $stat=$this->connection->prepare("UPDATE USUARIO_PESO SET PESO=?,DATA_PESAGEM=? WHERE ID_USUARIO_PESO = ?");
            
            $stat->bindValue(1, $object->peso);
            $stat->bindValue(2, $object->dataPesagem);
            $stat->bindValue(3, $object->id_usuarioPeso);
            $stat->execute();
            $this->connection = null;
            return 'Registro alterado.';
        } catch (Exception $ex) {
            throw new Exception('Não foi possível alterar o registro.');
        }
    }
}