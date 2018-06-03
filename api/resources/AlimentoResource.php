<?php
require_once 'service/AlimentoService.php';

/**
 * Recursos disponibilizados para Alimento.
 * 
 * @author Marcelo Zilio Correa - marcelo.zilio@hotmail.com
 * @since 02/06/2018
 */

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $alimento = json_decode($request->getBody());
        $service = new AlimentoService();
        echo json_encode($service->save($alimento));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/find/:id', function ($id) {
    try {
        $service = new AlimentoService();
        $alimento = $service->find($id);
        echo json_encode($alimento);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new AlimentoService();
        $alimentos = $service->findAll();
        echo json_encode($alimentos, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new AlimentoService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/update', function () use ($app) {
    try {
        $request = $app->request();
        $alimento = json_decode($request->getBody());
        $service = new AlimentoService();
        echo json_encode($service->update($alimento));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findByCategoria/:id', function ($id) {
    try {
        $service = new AlimentoService();
        $alimentos = $service->findByCategoria($id);
        echo json_encode($alimentos, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});