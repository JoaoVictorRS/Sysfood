<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Produtos</h1>
        </div>
        <?php 
             require_once('../../controllers/categorias_controller.php');
        
             $categoriasController = new CategoriasController();
             $categorias_quantidade = $categoriasController->index_quantidade();
            if ($categorias_quantidade > 0){
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
    <div class="card-deck">
        <?php if (!empty($produtos)): ?>
        <?php foreach ($produtos as $produto): ?>
        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-4" style="height: 180px;">
                    <img src="../../uploads/<?= $produto['imagem']; ?>" alt="" class="rounded card-img h-100">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $produto['nome_produto']; ?></h5>
                        <p class="card-text"><?= $produto['descricao']; ?>.</p>
                        <p class="card-text">Valor: R$<?= $produto['valor']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </div>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>