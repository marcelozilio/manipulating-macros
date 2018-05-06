<?php
/**
 * Contrato de assinatura de serviços.
 *
 * @author: Marcelo Zilio Correa
 * @since: 01/05/2018
 */
interface IService
{
    /**
     * Salva um objeto.
     * 
     * @param $object Objeto que será salvo.
     */
    public function save($object);
    /**
     * Busca um objeto pelo $id.
     * 
     * @param $id Identificador do objeto que será buscado.
     */
    public function find($id);
    /**
     * Busca todos objetos.
     */
    public function findAll();
    /**
     * Deleta um objeto pelo $id.
     * 
     * @param $id Identificador do objeto que será deletado.
     */
    public function delete($id);
    /**
     * Altera um objeto salvo.
     * 
     * @param $object Objeto que será alterado.
     */
    public function update($object);
}