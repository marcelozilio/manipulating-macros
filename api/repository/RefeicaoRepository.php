<?php
require_once 'persistence/ConnectionDataBase.php';
require_once 'interface/IRepository.php';
require_once 'model/Refeicao.php';
/**
* Classe responsável pela persistência de refeição no banco de dados.
*
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 17/06/2018
*/
class MacrosRepository implements IRepository
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDataBase::getConnection();
    }

    public function save($object)
    {
        try {
            $stat=$this->connection->prepare("INSERT INTO REFEICAO(ID_REFEICAO,ID_DIA,ID_USUARIO,DESCRICAO,CALORIAS)values(null,?,?,?,?)");
            
            $stat->bindValue(1, $object->ID_REFEICAO);
            $stat->bindValue(3, $object->ID_DIA);
            $stat->bindValue(2, $object->ID_USUARIO);
            $stat->bindValue(4, $object->DESCRICAO);
            $stat->bindValue(5, $object->CALORIAS);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Erro ao incluir refeição');
        }
    }

    public function find($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM REFEICAO WHERE ID_REFEICAO = $id");
            $refeicao = $stat->fetchObject('Refeicao');
            return $refeicao;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function findAll()
    {
        try {
            $stat = $this->connection->query("SELECT * FROM REFEICAO");
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
            $stat = $this->connection->prepare("DELETE FROM REFEICAO WHERE ID_REFEICAO=?");
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
            $stat=$this->connection->prepare("UPDATE REFEICAO SET DESCRICAO=?,CALORIAS=? WHERE ID_REFEICAO = ?");
            
            $stat->bindValue(1, $object->DESCRICAO);
            $stat->bindValue(2, $object->CALORIAS);
            $stat->bindValue(3, $object->ID_REFEICAO);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível alterar o registro.'.$ex);
        }
    }
}