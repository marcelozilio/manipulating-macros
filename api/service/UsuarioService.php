<?php
require_once 'repository/UsuarioRepository.php';
require_once 'interfaces/IService.php';
/**
* Serviços de usuário.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 01/05/2017
*/
class PessoaService implements IService
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = new PessoaRepository();
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