<?php
require_once 'service/DiaService.php';

/**
 * Recursos disponibilizados para dia.
 * 
 * @author Marcelo Zilio Correa - marcelo.zilio@hotmail.com
 * @since 30/06/2018
 */

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $dia = json_decode($request->getBody());
        $service = new DiaService();
        echo json_encode($service->save($dia));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/find/:id', function ($id) {
    try {
        $service = new DiaService();
        $dia = $service->find($id);
        echo json_encode($dia);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new DiaService();
        $dias = $service->findAll();
        echo json_encode($dias);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new DiaService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/update', function () use ($app) {
    try {
        $request = $app->request();
        $dia = json_decode($request->getBody());
        $service = new DiaService();
        echo json_encode($service->update($dia));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findDiasByUsuario/:id', function ($id) {
    try {
        $service = new DiaService();
        $dias = $service->findDiasByUsuario($id);
        echo json_encode($dias);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});