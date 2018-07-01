<?php
include_once 'repository/RefeicaoRepository.php';
include_once 'interface/IService.php';
/**
* Serviços de refeição.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 17/06/2018
*/
class RefeicaoService implements IService
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = new RefeicaoRepository();
    }
    
    public function save($object)
    {
        try {
            return $this->repository->save($object);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function find($id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function findAll()
    {
        try {
            return $this->repository->findAll();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function delete($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    public function update($object)
    {
        try {
            return $this->repository->update($object);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }  
    }

    public function findRefeicoesByDia($id)
    {
        try {
            return $this->repository->findRefeicoesByDia($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function saveRefeicoesFromDiario($id)
    {
        try {
            $refeicao = new Refeicao();
            for ($i = 1; $i <= 6; $i++) {
                $refeicao->ID_DIA = $id;
                $refeicao->DESCRICAO = 'Refeição '.$i;
                $refeicao->CALORIAS = 0;
                $this->repository->save($refeicao);                        
            }
            $this->repository->closeConnection();
            return true;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}