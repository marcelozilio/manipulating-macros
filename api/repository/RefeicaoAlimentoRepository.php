<?php
require_once 'persistence/ConnectionDataBase.php';
require_once 'interface/IRepository.php';
require_once 'model/RefeicaoAlimento.php';
/**
* Classe responsável pela persistência do relacionamento de
* Refeição e Alimento no banco de dados.
*
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 17/06/2018
*/
class RefeicaoAlimentoRepository implements IRepository
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionDataBase::getConnection();
    }

    public function save($object)
    {
        try {
            $stat=$this->connection->prepare("INSERT INTO REFEICAO_ALIMENTO(ID_REFEICAO_ALIMENTO,ID_REFEICAO,ID_ALIMENTO,DATA_REFEICAO)values(null,?,?,?)");
            
            $stat->bindValue(1, $object->ID_REFEICAO);
            $stat->bindValue(2, $object->ID_DIA);
            $stat->bindValue(3, $object->ID_USUARIO);
            $stat->bindValue(4, $object->DESCRICAO);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Erro ao incluir registro');
        }
    }

    public function find($id)
    {
        try {
            $stat = $this->connection->query("SELECT * FROM REFEICAO_ALIMENTO WHERE ID_REFEICAO_ALIMENTO = $id");
            $refeicao_alimento = $stat->fetchObject('RefeicaoAlimento');
            return $refeicao_alimento;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function findAll()
    {
        try {
            $stat = $this->connection->query("SELECT * FROM REFEICAO_ALIMENTO");
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
            $stat = $this->connection->prepare("DELETE FROM REFEICAO_ALIMENTO WHERE ID_REFEICAO_ALIMENTO=?");
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
            $stat=$this->connection->prepare("UPDATE REFEICAO_ALIMENTO SET DESCRICAO=? WHERE ID_REFEICAO_ALIMENTO = ?");
            
            $stat->bindValue(1, $object->DESCRICAO);
            $stat->bindValue(3, $object->ID_REFEICAO_ALIMENTO);
            $stat->execute();
            $this->connection = null;
            return true;
        } catch (Exception $ex) {
            throw new Exception('Não foi possível alterar o registro.'.$ex);
        }
    }
}