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

        //Retorna o valor da imagem do campo do tipo FILE
        $file = $this->request->getFile('imagem');

        //Verifique se a imagem é um arquivo válido e se já não foi movida
        if($file->isValid() && !$file->hasMoved()){
            $fileName = $file->getRandomName(); //Obtém um nome aleatório para a imagem.

            $file->move('uploads/produtosimagens/', $fileName); //Move a imagem para o directório uploads/produtosimagens presente na pasta public do CodeIgniter.
        }

        //Seleciona todo os valores vindo do formulário
        $data = $this->request->getPost(['nome', 'preco', 'estoque', 'descricao', 'codigo']);

        //Verifica se os dados vindo do formulário correspondem a validação abaixo.
        if(!$this->validateData($data, [
            'nome' => 'required|max_length[255]',
            'preco' => 'required',
            'estoque' => 'required',
            'descricao' => 'required',
            'codigo' => 'required',
        ])){

            //Os dados não são válidos, portanto, retorna novamente o formulário
            return $this->new();
        }

        //Obtém todos os dados validades e os atribui a variável $post
        $post = $this->validator->getValidated();
        $model = model(ProdutoModel::class);

        $model->save([
            'nome' => $post['nome'],
            'preco' => $post['preco'],
            'estoque' => $post['estoque'],
            'imagem' => $fileName,
            'descricao' => $post['descricao'],
            'slug' => url_title($post['nome'], '-', true),
            'codigo_produto' => $post['codigo'],
        ]);

        return view('pages/sucesso', $data);
    }
}