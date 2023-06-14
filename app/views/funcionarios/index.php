<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Funcionários</h1>
        </div>
        <a href="create.php" class="btn btn-primary">Novo funcionário</a>
    </div>
    <?php
        require_once('../../controllers/funcionarios_controller.php');
        require_once('../../controllers/usuarios_controller.php');
        $usuariosController = new UsuariosController();
        $funcionariosController = new FuncionariosController();
        if (isset($_SESSION['empresa'])) {
            $funcionarios = $funcionariosController->index($_SESSION['empresa']['id']);
        } else {
            $funcionarios = $funcionariosController->index($_SESSION['funcionario']['empresa_id']);
        }
    ?>
    <?php if (!empty($funcionarios)) : ?>
    <div class="row">
        <?php foreach ($funcionarios as $funcionario) : ?>
        <?php $usuario = $usuariosController->show($funcionario['usuario_id']) ?>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4">
            <div class="card">
                <div class=" card-body text-center">
                    <h5 class="card-title">Nome: <?= $usuario['nome'] ?></h5>
                    <p>Email: <?= $usuario['email'] ?></p>
                    <p>Cargo: <?= $funcionario['cargo'] ?></p>
                    <p>CPF: <?= $funcionario['cpf'] ?></p>
                    <div>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id_funcionario" value="<?= $funcionario['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir o funcionário <?= $usuario['nome'] ?>?')">Excluir</button>
                        </form>
                        <a href="../funcionarios/show.php?id=<?= $funcionario['id'] ?>"
                            class="btn btn-sm btn-primary">Pesquisar</a>
                        <a href="../funcionarios/edit.php?id=<?= $funcionario['id'] ?>"
                            class="btn btn-sm btn-info">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $funcionariosController->delete($_POST['id_funcionario']);
                header("Location: index.php?funcionario_deletado");
            }
        ?>
        <?php endforeach; ?>
        <?php else : ?>
        <div>
            <h5 colspan="6" class="text-center">Nenhum funcionário encontrado.</h5>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>