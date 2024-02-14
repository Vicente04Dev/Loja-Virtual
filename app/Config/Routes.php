<?php

use App\Controllers\ProdutoController;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Chama a rota para cadastrar um novo usuário no sistema.
$routes->get('newuser', [UserController::class, 'new']);

//Chama a rota para o usuário entrar no sistema.
$routes->get('login', 'UserController::login');

//Chama a rota para cadastrar novos produtos no sistema.
$routes->get('novoproduto', 'ProdutoController::new');
$routes->post('action', 'Action::index');

//Posts
$routes->post('novoproduto', [ProdutoController::class, 'create']);
$routes->post('novousuario', [UserController::class, 'create']);
