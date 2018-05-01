<?php
/**
 * Interface básica para manipulação de dados no banco.
 *
 * @author: Marcelo Zilio Correa
 * @since: 01/05/2018
 */
interface IRepository
{
    public function save($object);
    public function find($id);
    public function findAll();
    public function delete($id);
    public function update($object);
}