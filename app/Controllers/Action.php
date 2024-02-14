<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Action extends BaseController
{
    public function index()
    {
        //
        $db = \Config\Database::connect();
        if(isset($_POST['pid'])){
            $pcodigo = $_POST['pcodigo'];
            $pnome = $_POST['pnome'];
            $ppreco = $_POST['ppreco'];
            $pimagem = $_POST['pimagem'];
            $pquantidade = 1;
        
        
            $query = "SELECT codigo_produto FROM carrinho WHERE codigo_produto = :codigo";
            $query2 = $db->query($query, ['codigo'=> $pcodigo]);
        
            $cod = $query2->getResultArray();
            
            $codigo = $cod['codigo_produto'];
        
            if(!$codigo){
        
                $db->table('carrinho')->insert([
                    'nome' => $pnome,
                    'preco' => $ppreco,
                    'imagem' => $pimagem,
                    'quantidade' => $pquantidade,
                    'preco_total' =>$ppreco,
                    'codigo_produto' => $pcodigo
                ]);
        
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Item adicionado ao carrinho!</strong>
            </div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Este item já foi adicionado ao carrinho!</strong>
            </div>';
            }
        
            if(isset($_GET['cartItem'])){
                $smtp = $db->table('carrinho')->get();
                $rows = $smtp->getNumRows();
                echo $rows;
            }
        }
    }
}
