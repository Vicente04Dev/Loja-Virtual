<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<main class="flex-fill">
            <div class="container">
                
            <?= session()->getFlashdata('erros') ?>
            <?= validation_list_errors() ?>
                <form class="mt-3" method="post" action="/novoproduto" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 offset-3">
                        <h2>Informe os dados do novo produto, por favor</h2>
                            <hr>
                            <fieldset class="row gx-3">
                                <legend>Dados do Produto</legend>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" id="txtNome" name="nome" placeholder=" " autofocus value="<?= set_value('nome') ?>" />
                                    <label for="nome">Nome do produto</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-xl-4">
                                    <input class="form-control" type="number" name="preco" id="txtCPF" placeholder=" " value="<?= set_value('preco') ?>"/>
                                    <label for="preco">Preço</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-xl-4">
                                    <input class="form-control" name="estoque" type="number" id="estoque" placeholder=" " value="<?= set_value('estoque')?>"/>
                                    <label for="txtDataNascimento" class="d-inline d-sm-none d-md-inline d-lg-none">Estoque</label>
                                    <label for="estoque" class="d-none d-sm-inline d-md-none d-lg-inline">Estoque</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="file" name="imagem" id="txtEmail" placeholder=" " value="<?= set_value('imagem') ?>"/>
                                    <label for="imagem">Imagem do produto</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <textarea class="form-control" placeholder=" " name="descricao" type="text" id="txtTelefone"><?= set_value('descricao') ?></textarea>
                                    <label for="descricao">Descrição</label>
                                </div>
                                
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="codigo" id="codigo" placeholder=" " value="<?= set_value('codigo') ?>"/>
                                    <label for="codigo">Código do produto</label>
                                </div>
                            </fieldset>

                            <hr />
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Desejo receber informações sobre promoções.
                        </label>
                    </div>
                    <div class="mb-3 text-left">
                        <a class="btn btn-light btn-outline-danger" href="/">Cancelar</a>
                        <input type="submit" value="Criar meu cadastro" class="btn btn-danger"/>
                    </div>
                        </div>
                    </div>
                </form>
            </div>
</main>
<?= $this->endSection() ?>