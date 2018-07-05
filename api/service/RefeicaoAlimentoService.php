<?php
include_once 'repository/RefeicaoAlimentoRepository.php';
include_once 'interface/IService.php';
/**
* Serviços do relacionamento de Refeição e Alimento.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 17/06/2018
*/
class RefeicaoAlimentoService implements IService
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = new RefeicaoAlimentoRepository();
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

    public function findByRefeicao($id)
    {
        try {
            return $this->repository->findByRefeicao($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}