<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-5">
    <h1>Adicionar Refeição</h1>
    <hr>
    <form action="" method="post">
        <div class="form-group">
            <?php
            require_once('../../controllers/produtos_controller.php');
            $produtosController = new ProdutosController();
            if (isset($_SESSION['funcionario'])){
                $produtos = $produtosController->index($_SESSION['funcionario']['empresa_id']);
            } elseif(isset($_SESSION['empresa'])){
                $produtos = $produtosController->index($_SESSION['empresa']['id']);
            }
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
            <input type="number" name="quantidade" id="quantidade" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="../sessoes/index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php
    require_once('../../controllers/pedido_produtos_controller.php');
    
    $pedido_produtosController = new PedidoProdutosController();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pedido_produtosController->create($_POST, $_GET['id_pedido']);
        header('Location: ../pedidos/show.php?id='.$_GET['id_pedido']);
    }
    ?>
<?php require_once '../../views/layouts/user/footer.php'; ?>