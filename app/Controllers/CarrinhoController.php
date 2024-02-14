<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CarrinhoController extends BaseController
{
    public function index()
    {
        //
        return view('pages/carrinho');
    }
}
