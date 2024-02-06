<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        //
    }

    public function new(){
        return view('registros/novousuario');
    }
    public function login(){
        return view('pages/login');
    }

    public function create(){
        return "<h1>Hello World!!</h1> Novo Usuário";
    }
}
