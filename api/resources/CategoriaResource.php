<?php
require_once 'service/CategoriaService.php';

/**
 * Recursos disponibilizados para Categoria.
 * 
 * @author Marcelo Zilio Correa - marcelo.zilio@hotmail.com
 * @since 02/06/2018
 */

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $categoria = json_decode($request->getBody());
        $service = new CategoriaService();
        echo json_encode($service->save($categoria));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/find/:id', function ($id) {
    try {
        $service = new CategoriaService();
        $categoria = $service->find($id);
        echo json_encode($categoria);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new CategoriaService();
        $categorias = $service->findAll();
        echo json_encode($categorias, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new CategoriaService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/update', function () use ($app) {
    try {
        $request = $app->request();
        $categoria = json_decode($request->getBody());
        $service = new CategoriaService();
        echo json_encode($service->update($categoria));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});