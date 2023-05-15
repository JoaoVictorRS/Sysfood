<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-5">
    <h1>Criar Pedido</h1>
    <hr>
    <form action="" method="post">
        <div class="form-group">
            <label for="descricao">Descrição do pedido:</label>
            <textarea name="descricao" id="descricao" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="nome_cliente">Nome do cliente:</label>
            <input type="text" name="nome_cliente" id="nome_cliente" class="form-control" required>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="../sessoes/index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php
    require_once('../../controllers/pedidos_controller.php');
    
    $pedidosController = new PedidosController();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pedidosController->create($_POST, $_GET['id_sessao']);
        header('Location: ../sessoes/show.php?id='.$_GET['id_sessao']);
    exit();
    }
    ?>
<?php require_once '../../views/layouts/user/footer.php'; ?>