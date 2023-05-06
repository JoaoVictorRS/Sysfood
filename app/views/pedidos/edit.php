<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Editar Sessão</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
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
                    value="<?php echo $pedido['descricao'] ?>" required>
            </div>
            <div class="form-group">
                <label for="nome_sessao">Nome do cliente:</label>
                <input type="text" name="nome_sessao" id="nome_sessao" class="form-control"
                    value="<?php echo $pedido['nome_cliente'] ?>" required>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de Início:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control"
                    value="<?php echo $pedido['hora_inicio'] ?>" required>
            </div>
            <div class="form-group">
                <label for="hora_fim">Hora de Fim:</label>
                <input type="time" name="hora_fim" id="hora_fim" class="form-control"
                    value="<?php echo $pedido['hora_fim'] ?>" required>
            </div>
            <div class="form-group">
                <label for="nome_sessao">Valor total:</label>
                <input type="text" name="nome_sessao" id="nome_sessao" class="form-control"
                    value="<?php echo $pedido['valor_total'] ?>" required>
            </div>
            <div class="form-group">
                <label for="status_sessao">Status:</label>
                <input type="text" name="nome_sessao" id="nome_sessao" class="form-control"
                    value="<?php echo $pedido['status_pedido'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <?php $pedidosController->update($pedido['id'], $_POST); ?>
</body>

</html>