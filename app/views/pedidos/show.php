<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Detalhes do Pedido</h1>
        </div>
        <?php 
             require_once('../../controllers/produtos_controller.php');
        
             $produtosController = new ProdutosController();
             $produtos_quantidade = $produtosController->index_quantidade();
            if ($produtos_quantidade > 0){
                echo '<a href="../pedido_produtos/create.php?id_produto='. $_GET['id']. '" class="btn btn-primary">Nova
        Refeição</a>';
            } else {
                echo '<h6 style="color: red;">Crie pelo menos um produto antes de criar um pedido!</h6>';
            }
        ?>
    </div>
    <?php
        require_once('../../controllers/pedido_produtos_controller.php');
        require_once('../../controllers/produtos_controller.php');
        $produtos_Controller = new ProdutosController();
        $pedido_produtosController = new PedidoProdutosController();
        $pedido_produtos = $pedido_produtosController->index($_GET['id'])
    ?>

    <div class="card-deck">
        <?php if (!empty($pedido_produtos)) : ?>
        <?php foreach ($pedido_produtos as $pedido_produto) : ?>
        <?php $produto = $produtos_Controller->show($pedido_produto['produto_id'])?>
        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-4" style="height: 180px;">
                    <img src="../../uploads/<?= $produto['imagem']; ?>" alt="" class="rounded card-img h-100">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $produto['nome_produto'] ?></h5>
                        <p class="card-text"><?= $produto['descricao'] ?>.</p>
                        <p class="card-text"><?= $pedido_produto['quantidade'] ?> Refeições</p>
                        <p class="card-text">Valor total: R$<?= $pedido_produto['valor_total'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </div>
    <a class="btn btn-secondary" href="../sessoes/show.php?id=<?= $_GET['id'] ?>">Voltar</a>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>