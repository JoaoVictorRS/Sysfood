<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Categorias</h1>
        </div>
        <a href="create.php" class="btn btn-primary">Nova Categoria</a>
    </div>
    <table class="table">
        <thead>
            <?php
                require_once('../../controllers/categorias_controller.php');
                
                $categoriasController = new CategoriasController();
                $categorias = $categoriasController->index();
            ?>
            <tr>
                <th>Nome da categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categorias)): ?>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria['nome_categoria'] ?></td>
                <td>
                    <div>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id_categoria" value="<?= $categoria['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir a categoria <?= $categoria['nome_categoria'] ?>?')">Excluir</button>
                        </form>
                        <a href="edit.php?id=<?= $categoria['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                        <a href="show.php?id=<?= $categoria['id'] ?>" class="btn btn-sm btn-primary">Pesquisar</a>
                    </div>
                </td>
            </tr>
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
                    $categoriasController->delete($_POST['id_categoria']);
                    header("Location: index.php");
                }
            ?>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Nenhuma categoria encontrada.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>