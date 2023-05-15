<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Funcionários</h1>
        </div>
        <a href="create.php" class="btn btn-primary">Nova funcionário</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Cargo</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
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
            <?php foreach ($funcionarios as $funcionario) : ?>
            <?php $usuario = $usuariosController->show($funcionario['usuario_id']) ?>
            <tr>
                <td><?= $usuario['nome']; ?></td>
                <td><?= $funcionario['cpf']; ?></td>
                <td><?= $funcionario['cargo']; ?></td>
                <td><?= $usuario['email']; ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id_funcionario" value="<?= $funcionario['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Tem certeza que deseja o funcionário <?= $usuario['nome'] ?>?')">Excluir</button>
                    </form>
                    <a href="../funcionarios/show.php?id=<?= $funcionario['id'] ?>"
                        class="btn btn-sm btn-primary">Pesquisar</a>
                    <a href="../funcionarios/edit.php?id=<?= $funcionario['id'] ?>"
                        class="btn btn-sm btn-info">Editar</a>
                </td>
            </tr>
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $funcionariosController->delete($_POST['id_funcionario']);
                }
            ?>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">Nenhuma funcionário encontrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>