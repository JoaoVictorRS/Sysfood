<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <?php
        require_once('../../controllers/produtos_controller.php');
        
        $produtosController = new ProdutosController();
        $produto = $produtosController->show($_GET['id']);     
    ?>
    <h1>Detalhes do produto</h1>
    <table class="table">
        <tr>
            <th>Nome do produto:</th>
            <td><?= $produto['nome_produto'] ?></td>
        </tr>
        <tr>
            <th>Descrição do produto:</th>
            <td><?= $produto['descricao'] ?></td>
        </tr>
        <tr>
            <th>Categoria:</th>
            <td><?= $produto['categoria_id'] ?></td>
        </tr>
    </table>
    <a class="btn btn-secondary" href="../sessoes/show.php?id=<?= $pedido['sessao_id'] ?>">Voltar</a>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>