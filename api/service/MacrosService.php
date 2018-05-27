<?php
include_once 'repository/MacrosRepository.php';
include_once 'interface/IService.php';
/**
* Serviços de macros.
* 
* @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since: 05/05/2017
*/
class MacrosService implements IService
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = new MacrosRepository();
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
    
    public function calculateMacros($usuario) 
    {
        try {
            $macros = new Macros();
            $calories = $usuario->calorias;
            $protein = $usuario->peso * 2.2;
            $calories = ($calories - ($protein * 4)) / 2;
            $carbs = $calories / 4;
            $fat = $calories / 9;

            $macros->id_macros = 0;
            $macros->id_usuario = $usuario->id_usuario;
            $macros->proteina = $protein;
            $macros->carboidrato = $carbs;
            $macros->gordura = $fat;

            $this->save($macros);
            return $macros->__toString();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
}