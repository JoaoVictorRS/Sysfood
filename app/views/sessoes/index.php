<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Sessões</h1>
        </div>
        <a href="create.php" class="btn btn-primary">Nova Sessão</a>
    </div>
    <table class="table">
        <tbody>
            <?php
                    require_once('../../controllers/sessoes_controller.php');
                    $sessoesController = new SessoesController();
                    $sessoes = $sessoesController->index();
                ?>
            <?php if (!empty($sessoes)): ?>
            <?php foreach ($sessoes as $sessao): ?>
            <tr>
                <div class="row mb-6">
                    <div class="col-md-6">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><?= $sessao['nome_sessao']; ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1">
                                        <label for=""><?= $sessao['hora_inicio']; ?></label>
                                        <label for=""><?= $sessao['status_sessao']; ?></label>
                                    </div>
                                    <div>
                                        <form action="<?= $sessoesController->delete($sessao['id']) ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                        </form>
                                        <a href="edit.php?id=<?= $sessao['id'] ?>"
                                            class="btn btn-sm btn-info">Editar</a>
                                        <a href="show.php?id=<?= $sessao['id'] ?>"
                                            class="btn btn-sm btn-primary">Pesquisar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Nenhuma sessão encontrada.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>