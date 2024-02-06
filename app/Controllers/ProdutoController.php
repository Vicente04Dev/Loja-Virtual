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

        $data = $this->request->getPost(['nome', 'preco', 'estoque', 'imagem', 'descricao']);

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
            'imagem' => 'teste',
            'descricao' => $post['descricao']
        ]);

        return view('pages/sucesso', $data);
    }

    public function upload()
    {
        $validationRule = [
            'imagem' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            'nome' => [
                'lable' => 'Nome do produto',
                'rules' => [

                ]
            ]    
            ],
        ];

        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            return view('upload_success', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('upload_form', $data);
    }
}
