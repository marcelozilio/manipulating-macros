<?php
/**
 * Interface básica para manipulação de dados no banco.
 *
 * @author: Marcelo Zilio Correa
 * @since: 01/05/2018
 */
interface IRepository
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