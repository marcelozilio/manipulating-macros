<?php
/**
 * Contrato de assinatura de serviços.
 *
 * @author: Marcelo Zilio Correa
 * @since: 01/05/2018
 */
interface IService
{
    public function save($object);
    public function find($id);
    public function findAll();
    public function delete($id);
    public function update($object);
}