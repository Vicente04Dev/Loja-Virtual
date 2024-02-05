<?php

use App\Controllers\ProdutoController;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('newuser', [UserController::class, 'new']);
$routes->get('login', 'UserController::login');
$routes->get('novoproduto', 'ProdutoController::new');

//Posts
$routes->post('novoproduto', [ProdutoController::class, 'create']);
$routes->post('novousuario', [UserController::class, 'create']);
