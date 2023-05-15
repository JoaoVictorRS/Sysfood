<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-5">
    <h1>Editar Categoria</h1>
    <hr>
    <?php
        require_once('../../controllers/categorias_controller.php');
        $categoriasController = new CategoriasController();
        $categoria = $categoriasController->show($_GET['id']);
    ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome_categoria">Nome da Categoria:</label>
            <input type="text" name="nome_categoria" id="nome_categoria" class="form-control"
                value="<?= $categoria['nome_categoria'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $categoriasController->update($categoria['id'], $_POST); ?>
<?php require_once '../../views/layouts/user/footer.php'; ?>