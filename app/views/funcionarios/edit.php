<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <?php
    require_once('../../controllers/enderecos_controller.php');
    require_once('../../controllers/usuarios_controller.php');
    require_once('../../controllers/funcionarios_controller.php');
    $funcionariosController = new FuncionariosController();
    $funcionario = $funcionariosController->show($_GET['id']);
    $enderecosController = new EnderecosController();
    $endereco_funcionario = $enderecosController->show($funcionario['endereco_id']);
    $usuariosController = new UsuariosController();
    $usuario_funcionario = $usuariosController->show($funcionario['usuario_id']);
    $cpf = $funcionario['cpf'];
    $cpf = $cpf_formatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    ?>
    <h1>Editar Funcionário</h1>
    <hr>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-3">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control f_create_edit" value="<?= $usuario_funcionario['nome'] ?>" />
            </div>
            <div class="col-md-3">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control f_create_edit" value="<?= $usuario_funcionario['sobrenome'] ?>" />
            </div>
            <div class="col-md-3">
                <label>Data de nascimento</label>
                <input type="date" name="data_nascimento" class="form-control f_create_edit" value="<?= $usuario_funcionario['data_nascimento'] ?>" />
            </div>
            <div class="col-md-3">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control f_create_edit" value="<?= $cpf ?>" maxlength="14" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label>Cargo</label>
                <select name="cargo" id="cargo" class="form-control" value="<?= $funcionario['cargo'] ?>" required>
                    <option value="Funcionário Comum">Funcionário Comum</option>
                    <option value="Funcionário Cozinha">Funcionário Cozinha</option>
                    <option value="Funcionário Gerente">Funcionário Gerente</option>
                    <option value="Funcionário Supervisor">Funcionário Supervisor</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Email</label>
                <input type="email" name="email" class="form-control f_create_edit" value="<?= $usuario_funcionario['email'] ?>" />
            </div>
        </div>
        <label for="">Endereço</label>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label>CEP</label>
                <input type="text" name="cep" class="form-control f_create_edit" value="<?= $endereco_funcionario['cep'] ?>" maxlength="9" />
            </div>

            <div class="col-md-6">
                <label>Rua</label>
                <input type="text" name="rua" class="form-control f_create_edit" value="<?= $endereco_funcionario['rua'] ?>" />
            </div>

            <div class="col-md-6">
                <label>Bairro</label>
                <input type="text" name="bairro" class="form-control f_create_edit" value="<?= $endereco_funcionario['bairro'] ?>" />
            </div>

            <div class="col-md-6">
                <label>Cidade</label>
                <input type="text" name="cidade" class="form-control f_create_edit" value="<?= $endereco_funcionario['cidade'] ?>" />
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <input type="text" name="estado" class="form-control f_create_edit" value="<?= $endereco_funcionario['estado'] ?>" />
            </div>

            <div class="col-md-6">
                <label>Complemento</label>
                <input type="text" name="complemento" class="form-control f_create_edit" value="<?= $endereco_funcionario['complemento'] ?>" />
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
    $_POST['cpf'] = $cpf_limpo = str_replace(array('.', '-'), '', $_POST['cpf']);
    $test = $funcionariosController->update($_GET['id'], $_POST, $endereco_funcionario['id'], $usuario_funcionario['id']);
    header('Location: index.php?funcionario_editado');
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>