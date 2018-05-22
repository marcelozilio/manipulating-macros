<?php
include_once 'repository/UsuarioRepository.php';
include_once 'interface/IService.php';
/**
* Serviços de usuário.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 01/05/2017
*/
class UsuarioService implements IService
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = new UsuarioRepository();
    }
    
    public function save($object)
    {
        try {
            $object->calorias = $this->calculateCalories($object);
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
            $object->calorias = $this->calculateCalories($object);
            return $this->repository->update($object);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }  
    }
    
    public function autenticate($object)
    {
        try {
            return $this->repository->autenticate($object);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }  
    }
    
    public function calculateCalories($usuario) 
    {
        $tmb = ((10 * $usuario->peso) + (6.25 * $usuario->altura)) - (5 * $usuario->idade);
        
        $usuario->sexo == 'Masculino' ? $tmb += 5 : $tmb -= 161;
        
        $tmb *= 1.2;
        if ($usuario->objetivo == 'cutting') {
            return $tmb - 500;
        } elseif ($usuario->objetivo == 'bulking') {
            return $tmb + 500;
        } else {
            return $tmb;
        }    
    }
}