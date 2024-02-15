<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarrinhoModel;
use CodeIgniter\HTTP\ResponseInterface;

class CarrinhoController extends BaseController
{
    public function index()
    {
        //
        $model = model(CarrinhoModel::class);
        $data = [
            'produtos' => $model->getProdutos()
        ];

        return view('pages/carrinho', $data);
    }
}
