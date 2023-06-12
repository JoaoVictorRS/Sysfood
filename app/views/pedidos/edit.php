<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-5">
    <h1>Editar Pedido</h1>
    <hr>
    <?php
        require_once('../../controllers/pedidos_controller.php');
        
        $pedidosController = new PedidosController();
        $pedido = $pedidosController->show($_GET['id']);
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nome_cliente">Nome do cliente:</label>
            <input type="text" name="nome_cliente" id="nome_cliente" class="form-control"
                value="<?= $pedido['nome_cliente'] ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do pedido:</label>
            <textarea name="descricao" id="descricao" class="form-control" cols="10"
                rows="5"><?= $pedido['descricao'] ?></textarea>
        </div>
        <hr>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) { 
    $pedidosController->update($_GET['id'], $_POST);
    header("Location: index.php");
}
require_once '../../views/layouts/user/footer.php';
?>