<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">
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
            if (isset($_SESSION['funcionario'])) {
                $sessoes = $sessoesController->index($_SESSION['funcionario']['empresa_id']);
            } elseif (isset($_SESSION['empresa'])) {
                $sessoes = $sessoesController->index($_SESSION['empresa']['id']);
            }
            ?>
            <?php if (!empty($sessoes)) : ?>
            <div class="row mb-6">
                <?php foreach ($sessoes as $sessao) : ?>
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title"><?= $sessao['nome_sessao']; ?></h5>
                                </div>
                                <label for="">Status: <Strong><?=  $sessao['status_sessao']; ?></Strong></label>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <label for="">Inicio: <Strong><?= $sessao['hora_inicio']; ?></Strong></label>
                                </div>
                                <div>
                                    <form action="" id="excluir_sessao" method="POST">
                                        <input type="hidden" name="id_sessao" value="<?= $sessao['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Tem certeza que deseja excluir a sessão <?= $sessao['nome_sessao'] ?>?')">Excluir</button>
                                    </form>
                                    <a href="edit.php?id=<?= $sessao['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                                    <a href="show.php?id=<?= $sessao['id'] ?>"
                                        class="btn btn-sm btn-primary">Pedidos</a>
                                    <a href="finalizar_sessao.php?id=<?= $sessao['id'] ?>"
                                        class="btn btn-sm btn-warning">Finalizar
                                        Sessão</a>
                                </div>
                                <?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                                            $sessoesController->delete($_POST['id_sessao']);
                                            header("Location: index.php?sessao_deletada");
                                        }
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else : ?>
            <tr>
                <h5 colspan="6" class="text-center">Nenhuma sessão encontrado.</h5>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>