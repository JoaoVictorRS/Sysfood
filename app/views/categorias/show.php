<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <?php
        require_once('../../controllers/categorias_controller.php');
        
        $categoriasController = new CategoriasController();
        $categoria = $categoriasController->show($_GET['id']);     
    ?>
    <h1>Detalhes do produto</h1>
    <table class="table">
        <tr>
            <th>Categoria:</th>
            <td><?= $categoria['nome_categoria'] ?></td>
        </tr>
    </table>
    <a class="btn btn-secondary" href="index.php">Voltar</a>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>