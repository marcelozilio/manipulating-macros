<?php
require_once 'service/MacrosService.php';

/**
 * Recursos disponibilizados para macros.
 * 
 * @author Marcelo Zilio Correa - marcelo.zilio@hotmail.com
 * @since 05/05/2018
 */

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $macros = json_decode($request->getBody());
        $service = new MacrosService();
        echo json_encode($service->save($macros));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/find/:id', function ($id) {
    try {
        $service = new MacrosService();
        $macros = $service->find($id);
        echo json_encode($macros);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new MacrosService();
        $macros = $service->findAll();
        echo json_encode($macros);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new MacrosService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/update', function () use ($app) {
    try {
        $request = $app->request();
        $macros = json_decode($request->getBody());
        $service = new MacrosService();
        echo json_encode($service->update($macros));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/calculate', function () use ($app) {
    try {
        $request = $app->request();
        $usuario = json_decode($request->getBody());
        $service = new MacrosService();
        echo ($service->calculateMacros($usuario));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});