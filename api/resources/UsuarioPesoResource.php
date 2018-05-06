<?php
require_once 'service/UsuarioPesoService.php';

/**
* Recursos disponibilizados para pesagem do usuário.
* 
* @author Marcelo Zilio Correa - marcelo.zilio@hotmail.com
* @since 05/05/2018
*/

$app->post('/save', function () use ($app) {
    try {
        $request = $app->request();
        $usuarioPeso = json_decode($request->getBody());
        $service = new UsuarioPesoService();
        echo json_encode($service->save($usuarioPeso));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

/**
* Busca todos registros de pesagem do usuário.
* 
* @param $id Identificador do usuário.
*/
$app->get('/find/:id', function ($id) {
    try {
        $service = new UsuarioPesoService();
        $usuarioPesos = $service->find($id);
        echo json_encode($usuarioPesos);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/findAll', function () {
    try {
        $service = new UsuarioPesoService();
        $usuariosPesos = $service->findAll();
        echo json_encode($usuariosPesos);
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->get('/delete/:id', function ($id) {
    try {
        $service = new UsuarioPesoService();
        echo json_encode($service->delete($id));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});

$app->put('/update', function () use ($app) {
    try {
        $request = $app->request();
        $usuarioPeso = json_decode($request->getBody());
        $service = new UsuarioPesoService();
        echo json_encode($service->update($usuarioPeso));
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
});