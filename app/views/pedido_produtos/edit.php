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
    <form action="" method="post">
        <div class="form-group">
            <label for="nome_sessao">Descrição do pedido:</label>
            <input type="text" name="nome_sessao" id="nome_sessao" class="form-control"
                value="<?= $pedido['descricao'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nome_sessao">Nome do cliente:</label>
            <input type="text" name="nome_sessao" id="nome_sessao" class="form-control"
                value="<?= $pedido['nome_cliente'] ?>" required>
        </div>
        <div class="form-group">
            <label for="status_sessao">Status:</label>
            <input type="text" name="nome_sessao" id="nome_sessao" class="form-control"
                value="<?= $pedido['status_pedido'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $pedidosController->update($pedido['id'], $_POST); ?>
<?php require_once '../../views/layouts/user/footer.php'; ?>