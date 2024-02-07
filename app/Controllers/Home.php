<?php

namespace App\Controllers;
use App\Models\HomeModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = model(HomeModel::class);
        $data = [
            'produtos' => $model->getProdutos(),
        ];

        return view('pages/home', $data);
    }
}
