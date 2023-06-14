<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <?php
    if (strcmp(isset($_SESSION['funcionario']['cargo']), 'Funcionário Gerente') == 0 || strcmp(isset($_SESSION['funcionario']['cargo']), 'Funcionário Supervisor') == 0) {
        echo '<div class="d-flex justify-content-between align-items-center">
            <div class="flex-grow-1">
                <h1>Categorias</h1>
            </div>
            <a href="create.php" class="btn btn-primary">Nova Categoria</a>
            </div>';
    } else {
        echo '<div >
        <h1>Categorias</h1>
        </div>';
    }

    require_once('../../controllers/categorias_controller.php');

    $categoriasController = new CategoriasController();
    $categorias = $categoriasController->index();
    ?>
    <div class="row">
        <?php foreach ($categorias as $categoria) : ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <div class=" card-body text-center">
                    <h5 class="card-title"><?= $categoria['nome_categoria'] ?></h5>
                    <div>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id_categoria" value="<?= $categoria['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir a categoria <?= $categoria['nome_categoria'] ?>?')">Excluir</button>
                        </form>
                        <a href="edit.php?id=<?= $categoria['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $categoriasController->delete($_POST['id_categoria']);
            header("Location: index.php");
        }
        ?>
    </div>
    <?php require_once '../../views/layouts/user/footer.php'; ?>