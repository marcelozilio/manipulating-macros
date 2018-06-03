<?php
require_once 'persistence/ConnectionDataBase.php';
require_once 'interface/IRepository.php';
require_once 'model/Categoria.php';
/**
* Classe responsável pela persistência de categoria no banco de dados.
*
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 02/06/2018
*/
class CategoriaRepository implements IRepository
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDataBase::getConnection();
    }

    public function save($object)
    {
        try {
            $stat=$this->connection->prepare("INSERT INTO CATEGORIA(ID_CATEGORIA,DESCRICAO)values(null,?)");        
            $stat->bindValue(1, $object->id_categoria);
            $stat->bindValue(2, $object->descricao);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Erro ao incluir categoria.');
        }
    }

    public function find($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM CATEGORIA WHERE ID_CATEGORIA = $id");
            $categoria = $stat->fetchObject('Categoria');
            return $categoria;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function findAll()
    {
        try {
            $stat = $this->connection->query(" SELECT * FROM CATEGORIA");
            $array = $stat->fetchAll(PDO::FETCH_OBJ);
            $this->connection = null;
            return $array;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível buscar os registros'.$ex);
        }
    }

    public function delete($id)
    {
        try {
            $stat = $this->connection->prepare("DELETE FROM CATEGORIA WHERE ID_CATEGORIA=?");
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
            $stat=$this->connection->prepare("UPDATE CATEGORIA SET DESCRICAO=? WHERE ID_CATEGORIA = ?");
            
            $stat->bindValue(1, $object->descricao);
            $stat->bindValue(2, $object->id_categoria);    
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível alterar o registro.');
        }
    }
}