<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php
            require_once('../../controllers/sessoes.php');
            require_once('../../controllers/pedidos.php');
            $pedidosController = new PedidosController();
            $pedido = $pedidosController->show($_GET['id'])
        ?>
        <div class="text-right mb-3">
            <a href="../pedidos/create.php?id_sessao=<?= $_GET['id'] ?>" class="btn btn-primary">Novo pedido</a>
        </div>
        <table class="table">
            <thead>
                <h1>
                    Pedidos
                </h1>
                <tr>
                    <th>Descrição do pedido</th>
                    <th>Nome do cliente</th>
                    <th>Hora de inicio</th>
                    <th>Hora de Fim</th>
                    <th>Valor total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once('../../controllers/pedidos.php');
                    $pedidosController = new PedidosController();
                    $pedidos = $pedidosController->show_pedidos($_GET['id']);
                ?>
                <?php if (!empty($pedidos)): ?>
                <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?php echo $pedido['descricao']; ?></td>
                    <td><?php echo $pedido['nome_cliente']; ?></td>
                    <td><?php echo $pedido['hora_inicio']; ?></td>
                    <td><?php echo $pedido['hora_fim']; ?></td>
                    <td><?php echo $pedido['valor_total']; ?></td>
                    <td><?php echo $pedido['status_pedido']; ?></td>
                    <td colspan="6">
                        <a href="../pedidos/show.php?id=<?= $pedido['id'] ?>"
                            class="btn btn-sm btn-primary">Pesquisar</a>
                        <a href="../pedidos/edit.php?id=<?= $pedido['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                        <form action="<?= $pedidosController->delete($pedido['id']) ?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhuma pedido encontrado.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a class="btn btn-secondary" href="index.php">Voltar</a>
    </div>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>