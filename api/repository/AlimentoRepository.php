<?php
require_once 'persistence/ConnectionDataBase.php';
require_once 'interface/IRepository.php';
require_once 'model/Alimento.php';
/**
* Classe responsável pela persistência de alimento no banco de dados.
*
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 02/06/2018
*/
class AlimentoRepository implements IRepository
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDataBase::getConnection();
    }

    public function save($object)
    {
        try {
            $stat=$this->connection->prepare("INSERT INTO `ALIMENTO`(`ID_ALIMENTO`, `ID_CATEGORIA`, `DESCRICAO`, `PROTEINA`, `CARBOIDRATO`, `LIPIDEOS`, `KCAL`)values(null,?,?,?,?,?,?)");        
            $stat->bindValue(1, $object->id_categoria);
            $stat->bindValue(2, $object->descricao);
            $stat->bindValue(3, $object->proteina);
            $stat->bindValue(4, $object->carboidrato);
            $stat->bindValue(5, $object->gordura);
            $stat->bindValue(6, $object->kcal);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Erro ao incluir alimento.');
        }
    }

    public function find($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM ALIMENTO WHERE ID_ALIMENTO = $id");
            $alimento = $stat->fetchObject('Alimento');
            return $alimento;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function findAll()
    {
        try {
            $stat = $this->connection->query(" SELECT * FROM ALIMENTO");
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
            $stat = $this->connection->prepare("DELETE FROM ALIMENTO WHERE ID_ALIMENTO=?");
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
            $stat=$this->connection->prepare("UPDATE ALIMENTO SET ID_CATEGORIA=?, DESCRICAO=?, PROTEINA=?, CARBOIDRATO=?, LIPIDEOS=?, KCAL=? WHERE ID_ALIMENTO = ?");
            
            $stat->bindValue(1, $object->id_categoria);
            $stat->bindValue(2, $object->descricao);
            $stat->bindValue(3, $object->proteina);
            $stat->bindValue(4, $object->carboidrato);
            $stat->bindValue(5, $object->gordura);
            $stat->bindValue(6, $object->kcal);
            $stat->bindValue(7, $object->id_alimento);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível alterar o registro.');
        }
    }

    public function findByCategoria($id)
    {
        try {
            $stat = $this->connection->query(" SELECT * FROM ALIMENTO WHERE ID_CATEGORIA = $id");
            $array = $stat->fetchAll(PDO::FETCH_OBJ);
            $this->connection = null;
            return $array;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível buscar os registros');
        }
    }
}