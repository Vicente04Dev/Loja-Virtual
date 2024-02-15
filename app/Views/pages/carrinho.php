<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive mt-2">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td colspan="7">
                            <h4 class="text-center text-info m-0">Produtos no seu Carrinho</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>imagem</th>
                        <th>Preço total</th>
                        <th>
                            <a href="" class="badge bg-danger badge-danger p-2">Limpar carrinho</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($produtos) and is_array($produtos)): ?>
                        <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td> <?= $produto['id'] ?> </td>
                                <td> <?= $produto['nome'] ?> </td>
                                <td> <?= number_format($produto['preco']); ?> </td>
                                <td> <?= $produto['quantidade'] ?> </td>
                                <td> <img src="/uploads/produtosimagens/<?= $produto['imagem'] ?>" width="50"></td>
                                <td> <?= $produto['preco'] ?> </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>