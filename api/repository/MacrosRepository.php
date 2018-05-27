<?php
require_once 'persistence/ConnectionDataBase.php';
require_once 'interface/IRepository.php';
require_once 'model/Macros.php';
/**
* Classe responsável pela persistência de macros no banco de dados.
*
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 05/05/2018
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
            $stat=$this->connection->prepare("INSERT INTO MACROS(ID_MACROS,ID_USUARIO,PROTEINA,CARBOIDRATO,GORDURA)values(null,?,?,?,?)");
            
            $stat->bindValue(1, $object->id_usuario);
            $stat->bindValue(2, $object->proteina);
            $stat->bindValue(3, $object->carboidrato);
            $stat->bindValue(4, $object->gordura);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Erro ao incluir macros');
        }
    }

    public function find($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM MACROS WHERE ID_USUARIO = $id");
            $macros = $stat->fetchObject('Macros');
            return $macros;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function findAll()
    {
        try {
            $stat = $this->connection->query("SELECT * FROM MACROS");
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
            $stat = $this->connection->prepare("DELETE FROM MACROS WHERE ID_MACROS=?");
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
            $stat=$this->connection->prepare("UPDATE MACROS SET PROTEINA=?,CARBOIDRATO=?,GORDURA=? WHERE ID_USUARIO = ?");
            
            $stat->bindValue(1, $object->PROTEINA);
            $stat->bindValue(2, $object->CARBOIDRATO);
            $stat->bindValue(3, $object->GORDURA);
            $stat->bindValue(4, $object->ID_USUARIO);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível alterar o registro.'.$ex);
        }
    }
}