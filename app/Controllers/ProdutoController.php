<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProdutoController extends BaseController
{
    public function index()
    {
        //
    }


    public function new(){
        helper('form');
        return view('registros/novoproduto');
    }

    public function create(){
        helper('form');

        $file = $this->request->getFile('imagem');

        if($file->isValid() && !$file->hasMoved()){
            $fileName = $file->getRandomName();

            $file->move('uploads/produtosimagens/', $fileName);
        }
        $data = $this->request->getPost(['nome', 'preco', 'estoque', 'descricao']);

        if(!$this->validateData($data, [
            'nome' => 'required|max_length[255]',
            'preco' => 'required',
            'estoque' => 'required',
            'descricao' => 'required',
        ])){
            return $this->new();
        }

        $post = $this->validator->getValidated();
        $model = model(ProdutoModel::class);

        $model->save([
            'nome' => $post['nome'],
            'preco' => $post['preco'],
            'estoque' => $post['estoque'],
            'imagem' => $fileName,
            'descricao' => $post['descricao'],
            'slug' => url_title($post['nome'], '-', true),
        ]);

        return view('pages/sucesso', $data);
    }
}