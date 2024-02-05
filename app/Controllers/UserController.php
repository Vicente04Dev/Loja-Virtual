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
        return view('layouts/header')
                .view('registros/novousuario')
                .view('layouts/footer');
    }
    public function login(){
        return view('layouts/header')
                .view('pages/login')
                .view('layouts/footer');
    }
}
