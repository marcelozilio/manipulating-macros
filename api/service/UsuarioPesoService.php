<?php
include_once 'repository/UsuarioPesoRepository.php';
include_once 'interface/IService.php';
/**
* Serviços de pesagem do usuário.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 05/05/2017
*/
class UsuarioPesoService implements IService
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = new UsuarioPesoRepository();
    }
    
    public function save($object)
    {
        try {
            return $this->repository->save($object);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * Busca todos registros de pesagem do usuário.
     * 
     * @param $id Identificador do usuário.
     */
    public function find($id)
    {
        try {
            return $this->repository->find($cod);
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
}