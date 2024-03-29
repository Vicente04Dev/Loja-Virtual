<?= $this->extend('master') ?>

<?= $this->section('content') ?>


<div class="container">
    <div id="carouselMain" class="carousel slide carousel-dark" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="<?= base_url('img/slides/slide01.jpg') ?>" class="d-none d-md-block w-100" alt="">
                <img src="/img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/img/slides/slide01.jpg" class="d-none d-md-block w-100" alt="">
                <img src="/img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/img/slides/slide01.jpg" class="d-none d-md-block w-100" alt="">
                <img src="/img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
    <hr class="mt-3">
</div>

<main class="flex-fill">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <form class="justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Digite aqui o que procura">
                        <button class="btn btn-danger">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-7">
                <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                    <form class="d-inline-block">
                        <select class="form-select form-select-sm">
                            <option>Ordenar pelo nome</option>
                            <option>Ordenar pelo menor preço</option>
                            <option>Ordenar pelo maior preço</option>
                        </select>
                    </form>
                    <nav class="d-inline-block me-3">
                        <ul class="pagination pagination-sm my-0">
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">5</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">6</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <hr mt-3>

        <div class="row g-3">
            <div id="mensagem"></div>
            <?php if (!empty($produtos) and is_array($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">

                            <a href="#" class="position-absolute end-0 p-2 text-danger">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <a href="/produto.html">
                                <img src="/uploads/produtosimagens/<?= $produto['imagem'] ?>" class="card-img-top">
                            </a>
                            <div class="card-header">
                                <?= $produto['preco'] ?> Kz
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $produto['nome'] ?>
                                </h5>
                                <p class="card-text truncar-3l">
                                    <?= $produto['descricao'] ?>
                                </p>
                            </div>
                            <?php if ($produto['estoque'] == 0): ?>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-light disabled mt-2 d-block">
                                        <small>Reabastecendo Estoque</small>
                                    </a>
                                    <small class="text-danger">
                                        <b>Produto Esgotado</b>
                                    </small>
                                </div>
                            <?php else: ?>
                                <div class="card-footer">
                                    <form action="" class="form-submit">
                                        <input type="hidden" class="pid" name="pid" value="<?= $produto['id']?>">
                                        <input type="hidden" class="pnome" name="pnome" value="<?= $produto['nome']?>">
                                        <input type="hidden" class="ppreco" name="ppreco" value="<?= $produto['preco']?>">
                                        <input type="hidden" class="pimagem" name="pimagem" value="<?= $produto['imagem'] ?>">
                                        <input type="hidden" class="pcodigo" name="pcodigo" value="<?= $produto['codigo_produto']?>">
                                        <button class="btn btn-danger mt-2 d-block addItemBtn">Adicionar ao carrinho</button>
                                    </form>
                                    <small class="text-success">
                                        <?= $produto['estoque'] ?> em estoque
                                    </small>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <h3>Sem produtos</h3>
                <p>Não temos produtos em nosso estoque</p>
            <?php endif ?>
        </div>

        <hr class="mt-3">

        <div class="row pb-3">
            <div class="col-12">
                <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                    <form class="d-inline-block">
                        <select class="form-select form-select-sm">
                            <option>Ordenar pelo nome</option>
                            <option>Ordenar pelo menor preço</option>
                            <option>Ordenar pelo maior preço</option>
                        </select>
                    </form>
                    <nav class="d-inline-block me-3">
                        <ul class="pagination pagination-sm my-0">
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">5</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">6</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>