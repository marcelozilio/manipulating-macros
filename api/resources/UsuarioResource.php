<?php
require_once 'service/UsuarioService.php';

/**
 * Recursos disponibilizados para usuário.
 * 
 * @author Marcelo Zilio Correa - marcelo.zilio@hotmail.com
 * @since 01/05/2018
 */

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $usuario = json_decode($request->getBody());
        $service = new UsuarioService();
        echo json_encode($service->save($usuario));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/find/:id', function ($id) {
    try {
        $service = new UsuarioService();
        $usuario = $service->find($id);
        echo json_encode($usuario);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new UsuarioService();
        $usuarios = $service->findAll();
        echo json_encode($usuarios);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new UsuarioService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/update', function () use ($app) {
    try {
        $request = $app->request();
        $usuario = json_decode($request->getBody());
        $service = new UsuarioService();
        echo json_encode($service->update($usuario));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/autenticate', function () use ($app) {
    try {
        $request = $app->request();
        $usuario = json_decode($request->getBody());
        $service = new UsuarioService();
        echo json_encode($service->autenticate($usuario));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->post('/calculatecalories', function () use ($app) {
    try {
        $request = $app->request();
        $usuario = json_decode($request->getBody());
        $service = new UsuarioService();
        echo json_encode($service->calculateCalories($usuario));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});
