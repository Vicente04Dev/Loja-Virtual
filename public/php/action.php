<?php
include 'Connection.php';

if(isset($_POST['pid'])){
    $pcodigo = $_POST['pcodigo'];
    $pnome = $_POST['pnome'];
    $ppreco = $_POST['ppreco'];
    $pimagem = $_POST['pimagem'];
    $pquantidade = 1;


    $smtp = $connection->prepare("SELECT codigo_produto FROM carrinho WHERE codigo_produto = ?");
    $smtp->bind_param("s", $pcodigo);

    $smtp->execute();

    $result = $smtp->get_result();
    $cod = $result->fetch_assoc();
    
    $codigo = $cod['codigo_produto'];

    if(!$codigo){

        $query = $connection->prepare("INSERT INTO carrinho (nome, preco, imagem, quantidade, preco_total, codigo_produto) VALUES (?,?,?,?,?,?)");

        $query->bind_param("sssiss", $pnome, $ppreco, $pimagem, $pquantidade, $ppreco, $pcodigo);
        $query->execute();

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
}

    if(isset($_GET['cartItem']) AND isset($_GET['cartItem']) == "cart_item"){
        $smtp = $connection->prepare("SELECT * FROM carrinho");
        $smtp->execute();
        $smtp->store_result();

        $rows = $smtp->num_rows;
        echo $rows;
    }
