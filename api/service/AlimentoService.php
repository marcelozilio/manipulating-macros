<?php
include_once 'repository/AlimentoRepository.php';
include_once 'interface/IService.php';
/**
* Serviços de Alimento.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 02/06/2018
*/
class AlimentoService implements IService
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = new AlimentoRepository();
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

    public function findByCategoria($id)
    {
        try {
            return $this->repository->findByCategoria($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getCalories($alimento)
    {
        return ($alimento->CARBOIDRATO * 4) + ($alimento->PROTEINA * 4) + ($alimento->LIPIDEOS * 9);
    }
}