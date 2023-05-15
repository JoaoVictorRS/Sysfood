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
                <td><?= $categoria['nome_categoria']; ?></td>
                <td style="width: 700px;">
                    <a href="edit.php?id=<?= $categoria['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                    <a href="show.php?id=<?= $categoria['id'] ?>" class="btn btn-sm btn-primary">Pesquisar</a>

                </td>
            </tr>
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