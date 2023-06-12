<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<style>
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
</style>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Produtos</h1>
        </div>
        <?php
        require_once('../../controllers/categorias_controller.php');

        $categoriasController = new CategoriasController();
        $categorias_quantidade = $categoriasController->index_quantidade();
        if ($categorias_quantidade > 0) {
            echo '<a href="create.php" class="btn btn-primary">Nova Produto</a>';
        } else {
            echo '<h6 style="color: red;">Crie pelo menos uma categoria antes de criar um produto!</h6>';
        }
        ?>
    </div>
    <?php
    require_once('../../controllers/produtos_controller.php');
    $produtosController = new ProdutosController();
    $produtos = $produtosController->index();
    ?>
    <div class="row">
        <?php if (!empty($produtos)) : ?>
        <?php foreach ($produtos as $produto) : ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card" style="width: 100%;">
                <img src="../../uploads/<?= $produto['imagem']; ?>" alt="" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $produto['nome_produto']; ?></h5>
                    <p class="card-text"><?= $produto['descricao']; ?>.</p>
                    <p class="card-text text-center">Valor: R$<?= $produto['valor']; ?></p>
                </div>
                <div class="d-flex justify-content-center text-center" style="gap: 0.5rem; margin-bottom: 20px;">
                    <form action="" method="POST" class="mr-2">
                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Tem certeza que deseja excluir o produto <?= $produto['nome_produto'] ?>?')">Excluir</button>
                    </form>
                    <a href="show.php?id=<?= $produto['id'] ?>" class="btn btn-sm btn-primary">Pesquisar</a>
                    <a href="edit.php?id=<?= $produto['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <div class="col-12">
            <p>Nenhum produto encontrado.</p>
        </div>
        <?php endif; ?>
    </div>

</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>