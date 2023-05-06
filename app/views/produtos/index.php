<?php require_once '../../views/layouts/user/header.php'; ?>
<div class="container">
    <h1>Sessões</h1>
    <div class="text-right mb-3">
        <a href="create.php" class="btn btn-primary">Nova Sessão</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nome da Sessão</th>
                <th>Hora de Início</th>
                <th>Hora de Fim</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    require_once('../../controllers/sessoes_controller.php');
                    $sessoesController = new SessoesController();
                    $sessoes = $sessoesController->index();
                ?>
            <?php if (!empty($sessoes)): ?>
            <?php foreach ($sessoes as $sessao): ?>
            <tr>
                <td><?php echo $sessao['nome_sessao']; ?></td>
                <td><?php echo $sessao['hora_inicio']; ?></td>
                <td><?php echo $sessao['hora_fim']; ?></td>
                <td><?php echo $sessao['status_sessao']; ?></td>
                <td colspan="6">
                    <a href="show.php?id=<?= $sessao['id'] ?>" class="btn btn-sm btn-primary">Pesquisar</a>
                    <a href="edit.php?id=<?= $sessao['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                    <form action="<?= $sessoesController->delete($sessao['id']) ?>" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
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