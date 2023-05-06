<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Criar Sessão</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Criar Pedido</h1>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <label for="descricao">Descrição do pedido:</label>
                <input type="textarea" name="descricao" id="descricao" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome_cliente">Nome do cliente:</label>
                <input type="text" name="nome_cliente" id="nome_cliente" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de Início:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hora_fim">Hora de Fim:</label>
                <input type="time" name="hora_fim" id="hora_fim" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="valor_total">Valor total:</label>
                <input type="text" name="valor_total" id="valor_total" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status_pedido">Status:</label>
                <input type="text" name="status_pedido" id="status_pedido" class="form-control" required>
            </div>
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
</body>

</html>