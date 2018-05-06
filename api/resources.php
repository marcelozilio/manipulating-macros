<?php
header('Access-Control-Allow-Origin: *');
/**
 * Classe responsável por distribuir recursos da API REST.
 * 
 * @author: Marcelo Zilio Correa - marcelo.zilio@hotmail.com
 * @since: 01/04/2018
 */
require_once '../framework/Slim-2.6.3/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json');

/**
 * API
 */
$app->get('/', function () {
    echo "manipulating-macros REST API";
});

/**
 * Recursos de Usuário
 */
$app->group('/usuario', function () use ($app) {
    include_once 'resources/UsuarioResource.php';
});

/**
 * Recursos de Macros
 */
$app->group('/macros', function () use ($app) {
    include_once 'resources/MacrosResource.php';
});

$app->run();