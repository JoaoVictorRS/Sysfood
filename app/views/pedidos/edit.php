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
            <label for="descricao">Descrição do pedido:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="<?= $pedido['descricao'] ?>"
                required>
        </div>
        <div class="form-group">
            <label for="nome_cliente">Nome do cliente:</label>
            <input type="text" name="nome_cliente" id="nome_cliente" class="form-control"
                value="<?= $pedido['nome_cliente'] ?>" required>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="../sessoes/show.php?id=<?= $_GET['pedidos'] ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) { 
    $pedidosController->update($_GET['id'], $_POST);
    header("Location: ../sessoes/show.php?id=".$_GET['pedidos']);
}
require_once '../../views/layouts/user/footer.php';
?>