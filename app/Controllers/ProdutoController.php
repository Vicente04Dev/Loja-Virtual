<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProdutoController extends BaseController
{
    public function index()
    {
        //
    }

    public function new(){
        return view('layouts/header')
                .view('registros/novoproduto')
                .view('layouts/footer');
    }
}
