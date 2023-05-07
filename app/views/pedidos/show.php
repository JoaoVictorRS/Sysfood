<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Detalhes do Pedido</h1>
        </div>
        <a href="../pedido_produtos/create.php?id_produto=<?= $_GET['id'] ?>" class="btn btn-primary">Nova Refeição</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once('../../controllers/pedido_produtos_controller.php');
        
                $pedido_produtosController = new PedidoProdutosController();
                $pedido_produtos = $pedido_produtosController->index($_GET['id'])
            ?>
            <?= var_dump($_GET) ?>
            <?php if (!empty($pedido_produtos)) : ?>
            <?php foreach ($pedido_produtos as $pedido_produto) : ?>
            <tr>
                <td><?= $pedido_produto['produto_id']; ?></td>
                <td><?= $pedido_produto['quantidade']; ?></td>
                <td><?= $pedido_produto['valor_total']; ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Nenhuma refeição encontrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a class="btn btn-secondary" href="../sessoes/show.php?id=<?= $_GET['id'] ?>">Voltar</a>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>