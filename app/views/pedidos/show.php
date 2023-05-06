<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes da Sessão</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php
            require_once('../../controllers/pedidos_controller.php');
            
            $pedidosController = new PedidosController();
            $pedido = $pedidosController->show($_GET['id'])
        ?>
        <h1>Detalhes do Pedido</h1>
        <table class="table">
            <tr>
                <th>Descrição do pedido:</th>
                <td><?= $pedido['descricao'] ?></td>
            </tr>
            <tr>
                <th>Nome do cliente:</th>
                <td><?= $pedido['nome_cliente'] ?></td>
            </tr>
            <tr>
                <th>Hora de Início:</th>
                <td><?= $pedido['hora_inicio'] ?></td>
            </tr>
            <tr>
                <th>Hora de Fim:</th>
                <td><?= $pedido['hora_fim'] ?></td>
            </tr>
            <tr>
                <th>Valor total:</th>
                <td><?= $pedido['valor_total'] ?></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td><?= $pedido['status_pedido'] ?></td>
            </tr>
        </table>
        <a class="btn btn-secondary" href="../sessoes/show.php?id=<?= $pedido['sessao_id'] ?>">Voltar</a>
    </div>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>