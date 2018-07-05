<?php
require_once 'service/RefeicaoAlimentoService.php';

/**
 * Recursos disponibilizados para o relacionamento de Refeição Alimento.
 * 
 * @author Marcelo Zilio Correa - marcelo.zilio@hotmail.com
 * @since 17/06/2018
 */

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $refeicaoAlimento = json_decode($request->getBody());
        $service = new RefeicaoAlimentoService();
        echo json_encode($service->save($refeicaoAlimento));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/find/:id', function ($id) {
    try {
        $service = new RefeicaoAlimentoService();
        $refeicaoAlimento = $service->find($id);
        echo json_encode($refeicaoAlimento);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new RefeicaoAlimentoService();
        $refeicaosAlimentos = $service->findAll();
        echo json_encode($refeicaosAlimentos, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new RefeicaoAlimentoService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/update', function () use ($app) {
    try {
        $request = $app->request();
        $refeicaoAlimento = json_decode($request->getBody());
        $service = new RefeicaoAlimentoService();
        echo json_encode($service->update($refeicaoAlimento));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findByRefeicao/:id', function ($id) {
    try {
        $service = new RefeicaoAlimentoService();
        $refeicaosAlimentos = $service->findByRefeicao($id);
        echo json_encode($refeicaosAlimentos, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});