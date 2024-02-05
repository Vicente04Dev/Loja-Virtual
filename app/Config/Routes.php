<?php

use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('newuser', [UserController::class, 'new']);
$routes->get('login', 'UserController::login');
$routes->get('novoproduto', 'ProdutoController::new');
