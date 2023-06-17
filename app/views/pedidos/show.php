<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<style>
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
</style>
<div class="container">
    <div class="d-flex justify-content-between align-items-center" style="margin-top: 20px">
        <div class="flex-grow-1">
            <h1>Refeições</h1>
        </div>
        <?php
        require_once('../../controllers/produtos_controller.php');

        $produtosController = new ProdutosController();
        if (isset($_SESSION['funcionario'])) {
            $produtos_quantidade = $produtosController->index_quantidade($_SESSION['funcionario']['empresa_id']);
            if ($produtos_quantidade > 0) {
                echo '<a href="../pedido_produtos/create.php?id_pedido=' . $_GET['id'] . '" class="btn btn-primary">Nova
            Refeição</a>';
            } else {
                echo '<h6 style="color: red;">Não existe nenhum produto cadastrado!</h6>';
            }
        }
        ?>
    </div>
    <hr>
    <div>
        <?php
        require_once('../../controllers/pedidos_controller.php');
        $pedidosController = new PedidosController();
        $pedido = $pedidosController->show($_GET['id'])
        ?>
        <div class="d-flex justify-content-around">
            <h5 for="">Nome do cliente: <?= $pedido['nome_cliente'] ?> </h5>
            <h5 for="">Status do pedido: <?= $pedido['status_pedido'] ?></h5>
            <h5 for="">Valor total: <label for="" style="color:green">R$ <?= $pedido['valor_total'] ?></label>
                <h5 for="">Hora do pedido: <?= $pedido['hora_inicio'] ?></h5>
            </h5>
        </div>
    </div>
    <?php
    require_once('../../controllers/pedido_produtos_controller.php');
    require_once('../../controllers/produtos_controller.php');
    $produtos_Controller = new ProdutosController();
    $pedido_produtosController = new PedidoProdutosController();
    $pedido_produtos = $pedido_produtosController->index($_GET['id'])
    ?>

    <div class="card-container">
        <?php if (!empty($pedido_produtos)) : ?>
        <?php foreach ($pedido_produtos as $pedido_produto) : ?>
        <?php $produto = $produtos_Controller->show($pedido_produto['produto_id']) ?>
        <div class="card mb-8" style="width: 300px; margin-bottom: 20px;">
            <img src="../../uploads/<?= $produto['imagem']; ?>" alt="" class="card-img-top h-100">
            <div class="card-body">
                <h5 class="card-title text-center"><?= $produto['nome_produto'] ?></h5>
                <p class="card-text text-center"><?= $produto['descricao'] ?>.</p>
                <p class="card-text text-center"><?= $pedido_produto['quantidade'] ?> Refeições</p>
                <p class="card-text text-center">Total: R$<?= $pedido_produto['valor_total'] ?></p>
            </div>
            <div class="text-center" style="margin-bottom: 20px;">
                <form method="POST" class="d-inline-block">
                    <input type="hidden" name="id" value="<?= $pedido_produto['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Tem certeza que deseja excluir o produto <?= $produto['nome_produto'] ?> do pedido?')">Excluir</button>
                </form>
                <a href="../pedido_produtos/edit.php?id=<?= $pedido_produto['id'] ?>&pedido_id=<?= $_GET['id'] ?>"
                    class="btn btn-sm btn-info ml-2">Editar</a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <p>Nenhum Refeição encontrado.</p>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $pedido_produtosController->delete($_POST['id']);
                header("Location: show.php?id=" . $_GET['id']);
            }
            ?>
        <?php endif; ?>
    </div>
    <div class="text-center">
        <a class="btn btn-secondary" href="show.php?id=<?= $_GET['id'] ?>">Voltar</a>
    </div>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>