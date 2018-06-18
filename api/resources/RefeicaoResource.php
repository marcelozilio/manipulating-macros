<?php
require_once 'service/RefeicaoService.php';

/**
 * Recursos disponibilizados para Refeição.
 * 
 * @author Marcelo Zilio Correa - marcelo.zilio@hotmail.com
 * @since 17/06/2018
 */

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $refeicao = json_decode($request->getBody());
        $service = new RefeicaoService();
        echo json_encode($service->save($refeicao));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/find/:id', function ($id) {
    try {
        $service = new RefeicaoService();
        $refeicao = $service->find($id);
        echo json_encode($refeicao);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new RefeicaoService();
        $refeicoes = $service->findAll();
        echo json_encode($refeicoes, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new RefeicaoService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/update', function () use ($app) {
    try {
        $request = $app->request();
        $refeicao = json_decode($request->getBody());
        $service = new RefeicaoService();
        echo json_encode($service->update($refeicao));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});