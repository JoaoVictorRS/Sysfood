<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>

<?php
require_once('../../controllers/sessoes_controller.php');
require_once('../../controllers/pedidos_controller.php');
$pedidosController = new PedidosController();
?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">
        <div class="flex-grow-1">
            <h1>Pedidos finalizados</h1>
        </div>
    </div>
    <?php
    require_once('../../controllers/pedidos_controller.php');
    $pedidosController = new PedidosController();
    $pedidos = $pedidosController->pedidos_finalizado($_SESSION['funcionario']['sessao_id']);
    ?>
    <div class="row">
        <?php foreach ($pedidos as $pedido) : ?>
        <div class="col-md-6">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Nome do Cliente:</label>
                            <h5 class="card-title"><?= $pedido['nome_cliente'] ?></h5>
                            <label for="">Pedido feito em: <?= $pedido['hora_inicio'] ?></label>
                            <?php if (!empty($pedido['hora_fim'])) : ?>
                            <label for="">Pedido concluído em: <?= $pedido['hora_inicio'] ?></label>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <label for="">Descrição do pedido:</label>
                            <p class=""><?= $pedido['descricao'] ?></p>
                            <?php if (!empty($pedido['status_pedido'])) : ?>
                            <p>Status do pedido: <?= $pedido['status_pedido'] ?></p>
                            <?php else : ?>
                            <p>Status não definido</p>
                            <?php endif; ?>
                            <p>Valor total do pedido: <label for="" style="color: green">R$
                                    <?= $pedido['valor_total'] ?></label></p>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION['funcionario'])) {
                            if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
                                echo '<div class="text-center mt-3">
                                    <form method="POST" class="d-inline-block">
                                        <input type="hidden" name="id" value="' . $pedido['id'] . '">
                                    <button type="submit" class="btn btn-danger"';
                                echo 'onclick="return confirm("' . 'Tem certeza que deseja excluir o pedido do cliente' . $pedido['nome_cliente'] . '
                                    ?)">Excluir</button>';
                                echo '</form>
                                    <a href="show.php?id=' . $pedido['id'] . '" class="btn btn-primary ml-2">Refeições</a>
                                    <a href="edit.php?id=' . $pedido['id'] . '" class="btn btn-info ml-2">Editar</a>
                                </div>';
                            }
                            if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Comum') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Cozinha') == 0) {
                                echo '<div class="text-center mt-3">   
                                <a href="show.php?id=' . $pedido['id'] . '" class="btn btn-primary ml-2">Refeições</a>
                            </div>';
                            }
                        } elseif (isset($_SESSION['empresa'])) {
                            echo '<div class="text-center mt-3">
                            <form method="POST" class="d-inline-block">
                                <input type="hidden" name="id" value="' . $pedido['id'] . '">
                            <button type="submit" class="btn btn-danger"';
                            echo 'onclick="return confirm("' . 'Tem certeza que deseja excluir o pedido do cliente' . $pedido['nome_cliente'] . '
                            ?)">Excluir</button>';
                            echo '</form>
                            <a href="show.php?id=' . $pedido['id'] . '" class="btn btn-primary ml-2">Refeições</a>
                            <a href="edit.php?id=' . $pedido['id'] . '" class="btn btn-info ml-2">Editar</a>
                        </div>';
                        }
                        ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php if (empty($pedidos)) : ?>
    <div class="col-12">
        <p class="text-center">Nenhum pedido encontrado.</p>
    </div>
    <?php endif; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $pedidosController->delete($_POST['id']);
        header("Location: index.php");
    }
    ?>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>