<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <h1 style="margin-top: 20px">Cadastrar Funcionário</h1>
    <hr>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control f_create_edit" required />
            </div>
            <div class="col-md-3">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control f_create_edit" required />
            </div>
            <div class="col-md-3">
                <label>Data de nascimento</label>
                <input type="date" name="data_nascimento" class="form-control f_create_edit" required />
            </div>
            <div class="col-md-3">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control f_create_edit" maxlength="14" required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Cargo</label>
                <select name="cargo" id="cargo" class="form-control" required>
                    <?php
                    if ($_SESSION['empresa']) {
                        echo '
                            <option value="Funcionário Comum">Funcionário Comum</option>
                            <option value="Funcionário Cozinha">Funcionário Cozinha</option>
                            <option value="Funcionário Gerente">Funcionário Gerente</option>
                            <option value="Funcionário Supervisor">Funcionário Supervisor</option>
                             ';
                    } elseif ($_SESSION['funcionario'] && $_SESSION['funcionario']['cargo'] == 'Funcionário Supervisor') {
                        echo '
                            <option value="Funcionário Comum">Funcionário Comum</option>
                            <option value="Funcionário Cozinha">Funcionário Cozinha</option>
                            <option value="Funcionário Gerente">Funcionário Gerente</option>
                            ';
                    } elseif ($_SESSION['funcionario'] && $_SESSION['funcionario']['cargo'] == 'Funcionário Gerente') {
                        echo '
                            <option value="Funcionário Comum">Funcionário Comum</option>
                            <option value="Funcionário Cozinha">Funcionário Cozinha</option>
                            ';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control f_create" required />
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
</div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../controllers/enderecos_controller.php');
    require_once('../../controllers/usuarios_controller.php');
    require_once('../../controllers/funcionarios_controller.php');

    $_POST["cpf"] = str_replace(".", "", $_POST["cpf"]);
    $_POST["cpf"] = str_replace("-", "", $_POST["cpf"]);

    $enderecosController = new EnderecosController();
    $endereco = $enderecosController->create($_POST);
    $usuariosController = new UsuariosController();
    $usuario = $usuariosController->create($_POST);
    $funcionariosController = new FuncionariosController();
    if ($_SESSION['empresa']) {
        $funcionariosController->create($_POST, $endereco, $usuario, $_SESSION['empresa']['id']);
    } elseif ($_SESSION['funcionario']) {
        $funcionariosController->create($_POST, $endereco, $usuario, $_SESSION['funcionario']['empresa_id']);
    }
    header('Location: index.php?funcionario_criado');
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>