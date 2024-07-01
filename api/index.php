<?php

require '../vendor/autoload.php';

use App\Api\Router;
use App\Api\PersonController;
use App\Api\FurnitureController;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$router = new Router();

// Rotas para Person
$router->addRoute('POST', '/api/person', [PersonController::class, 'create']);
$router->addRoute('GET', '/api/person/(\d+)', [PersonController::class, 'get']);
$router->addRoute('GET', '/api/person', [PersonController::class, 'getAll']);
$router->addRoute('PUT', '/api/person/(\d+)', [PersonController::class, 'update']);
$router->addRoute('DELETE', '/api/person/(\d+)', [PersonController::class, 'delete']);

// Rotas para Furniture
$router->addRoute('POST', '/api/furniture', [FurnitureController::class, 'create']);
$router->addRoute('GET', '/api/furniture/(\d+)', [FurnitureController::class, 'get']);
$router->addRoute('GET', '/api/furniture', [FurnitureController::class, 'getAll']);
$router->addRoute('PUT', '/api/furniture/(\d+)', [FurnitureController::class, 'update']);
$router->addRoute('DELETE', '/api/furniture/(\d+)', [FurnitureController::class, 'delete']);

$router->handleRequest();
?>
