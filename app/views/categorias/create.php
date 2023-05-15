<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-5">
    <h1>Criar Categoria</h1>
    <hr>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome_categoria">Nome da Categoria:</label>
            <input type="text" name="nome_categoria" id="nome_categoria" class="form-control" required>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php
    require_once ('../../controllers/categorias_controller.php');
    $categoriasController = new CategoriasController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categoriasController->create($_POST);
        header('Location: index.php');
        exit;
    }
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>