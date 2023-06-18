<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <?php
    if (isset($_SESSION['funcionario'])) {
        if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0 || isset($_SESSION['empresa'])) {
            echo '<div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">
                <div class="flex-grow-1">
                    <h1>Categorias</h1>
                </div>
                <a href="create.php" class="btn btn-primary">Nova Categoria</a>
                </div>';
        } else {
            echo '<div style="margin-top: 20px;">
            <h1>Categorias</h1>
            </div>';
        }
    } elseif (isset($_SESSION['empresa'])) {
        echo '<div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">
                <div class="flex-grow-1">
                    <h1>Categorias</h1>
                </div>
                <a href="create.php" class="btn btn-primary">Nova Categoria</a>
                </div>';
    }

    require_once('../../controllers/categorias_controller.php');

    $categoriasController = new CategoriasController();
    if (isset($_SESSION['funcionario'])) {
        $categorias = $categoriasController->index($_SESSION['funcionario']['empresa_id']);
    } elseif (isset($_SESSION['empresa'])) {
        $categorias = $categoriasController->index($_SESSION['empresa']['id']);
    }
    ?>
    <div class="row">
        <?php if (!empty($categorias)) : ?>
        <?php foreach ($categorias as $categoria) : ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <div class=" card-body text-center">
                    <h5 class="card-title"><?= $categoria['nome_categoria'] ?></h5>
                    <?php
                            if (isset($_SESSION['funcionario'])) {
                                if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
                                    echo '<div>
                                <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id_categoria" value=' . $categoria["id"] . '>
                            <button type="submit" class="btn btn-sm btn-danger"';
                                    echo 'onclick="return confirm(' . 'Tem certeza que deseja excluir a categoria' . $categoria["nome_categoria"] . '?)">Excluir</button>';
                                    echo '</form>
                            <a href="edit.php?id=' . $categoria["id"] . '" class="btn btn-sm btn-info">Editar</a>
                        </div>';
                                }
                            } elseif (isset($_SESSION['empresa'])) {
                                echo '<div>
                                <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id_categoria" value=' . $categoria["id"] . '>
                            <button type="submit" class="btn btn-sm btn-danger"';
                                echo "<button onclick='return confirm(\"Tem certeza que deseja excluir a categoria " . $categoria["nome_categoria"] . "?\")'>Excluir</button>";
                                echo '</form>
                            <a href="edit.php?id=' . $categoria["id"] . '" class="btn btn-sm btn-info">Editar</a>
                        </div>';
                            }
                            ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <div>
            <h5 colspan="6" class="text-center">Nenhuma categoria encontrada.</h5>
        </div>
        <?php endif; ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $categoriasController->delete($_POST['id_categoria']);
            header("Location: index.php?categoria_deletada");
        }
        ?>
    </div>
    <?php require_once '../../views/layouts/user/footer.php'; ?>