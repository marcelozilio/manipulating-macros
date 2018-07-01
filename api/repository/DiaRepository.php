<?php
require_once 'persistence/ConnectionDataBase.php';
require_once 'interface/IRepository.php';
require_once 'model/Dia.php';
/**
* Classe responsável pela persistência de dias no banco de dados.
*
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 30/06/2018
*/
class DiaRepository implements IRepository
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDataBase::getConnection();
    }

    public function save($object)
    {
        try {
            $stat=$this->connection->prepare("INSERT INTO DIA(ID_DIA,ID_USUARIO,DESCRICAO,DATA_DIA,CALORIAS_TOTAIS_DIA)values(null,?,?,?,?)");
            
            $stat->bindValue(1, $object->ID_USUARIO);
            $stat->bindValue(2, $object->DESCRICAO);
            $stat->bindValue(3, $object->DATA_DIA);
            $stat->bindValue(4, $object->CALORIAS_TOTAIS_DIA);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Erro ao incluir registro'.$ex->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM DIA WHERE ID_USUARIO = $id ORDER BY ID_DIA DESC LIMIT 1");
            $dia = $stat->fetchObject('Dia');
            return $dia;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function findAll()
    {
        try {
            $stat = $this->connection->query("SELECT * FROM DIA");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_OBJ);
            $this->connection = null;
            return $array;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível buscar os registros');
        }
    }

    public function findDiasByUsuario($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM DIA WHERE ID_USUARIO = $id");
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
            $stat = $this->connection->prepare("DELETE FROM DIA WHERE ID_DIA=?");
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
            $stat=$this->connection->prepare("UPDATE DIA SET DESCRICAO=?,CALORIAS_TOTAIS_DIA=? WHERE ID_DIA = ?");
            
            $stat->bindValue(1, $object->DESCRICAO);
            $stat->bindValue(2, $object->CALORIAS_TOTAIS_DIA);
            $stat->bindValue(3, $object->ID_DIA);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível alterar o registro.'.$ex);
        }
    }
}