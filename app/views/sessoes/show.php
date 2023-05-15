<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <?php
    require_once('../../controllers/sessoes_controller.php');
    require_once('../../controllers/pedidos_controller.php');
    $pedidosController = new PedidosController();
    $pedido = $pedidosController->show($_GET['id'])
    ?>
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Pedidos</h1>
        </div>
        <a href="../pedidos/create.php?id_sessao=<?= $_GET['id'] ?>" class="btn btn-primary">Novo pedido</a>
    </div>
    <table class="table">
        <thead>
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
            require_once('../../controllers/pedidos_controller.php');
            $pedidosController = new PedidosController();
            $pedidos = $pedidosController->show_pedidos($_GET['id']);
            ?>
            <?php if (!empty($pedidos)) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
            <tr>
                <td><?= $pedido['descricao']; ?></td>
                <td><?= $pedido['nome_cliente']; ?></td>
                <td><?= $pedido['hora_inicio']; ?></td>
                <td><?= $pedido['hora_fim']; ?></td>
                <td><?= $pedido['valor_total']; ?></td>
                <td><?= $pedido['status_pedido']; ?></td>
                <td>
                    <div>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $pedido['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir o pedido?')">Excluir</button>
                        </form>
                        <a href="../pedidos/show.php?id=<?= $pedido['id'] ?>"
                            class="btn btn-sm btn-primary">Pesquisar</a>
                        <a href="../pedidos/edit.php?id=<?= $pedido['id'] ?>&pedidos=<?= $_GET['id']?>"
                            class="btn btn-sm btn-info">Editar</a>
                    </div>
                </td>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $pedidosController->delete($_POST['id']);
                        header('Location: show.php?id='.$_GET['id']);
                    }
                ?>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Nenhuma pedido encontrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a class="btn btn-secondary" href="index.php">Voltar</a>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>