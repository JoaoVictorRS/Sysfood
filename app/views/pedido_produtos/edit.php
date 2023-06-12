<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-5">
    <h1>Editar Pedido</h1>
    <hr>
    <?php
            require_once('../../controllers/pedido_produtos_controller.php');
            
            $pedidoProdutosController = new PedidoProdutosController();
            $pedido_produto = $pedidoProdutosController->show($_GET['id']);
            
        ?>
    <form action="" method="post">
        <div class="form-group">
                <?php
                require_once('../../controllers/produtos_controller.php');
                $produtosController = new ProdutosController();
                $produtos = $produtosController->index();
                ?>
                <label for="produto_id">Produto:</label>
                <select name="produto_id" id="produto_id" class="form-control" required>
                    <?php foreach ($produtos as $produto): ?>
                <option value="<?= $produto['id'] ?>">
                    <?= $produto['nome_produto'] ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control"
                value="<?= $pedido_produto['quantidade'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) { 
    $pedidoProdutosController->update($_GET['id'], $_POST, $_GET['pedido_id']);
    header("Location: ../pedidos/show.php?id=".$_GET['pedido_id']);
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>