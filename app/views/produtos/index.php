<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <? session_start(); ?>
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Produtos</h1>
        </div>
        <a href="create.php" class="btn btn-primary">Nova Produto</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome do produto</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once('../../controllers/produtos_controller.php');
                $produtosController = new ProdutosController();
                $produtos = $produtosController->index();
            ?>
            <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><img src="../../uploads/<?= $produto['imagem']; ?>" alt=""
                        style="width: 200px; height: 150px; border-radius: 20px;">
                </td>
                <td><?= $produto['nome_produto']; ?></td>
                <td><?= $produto['descricao']; ?></td>
                <td><?= $produto['categoria_id']; ?></td>
                <td><?= $produto['valor']; ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="2" class="text-center">Nenhuma produto encontrada.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>