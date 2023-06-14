<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <h1>Editar Adiministrador</h1>
    <hr>
    <?php
    require_once('../../controllers/usuarios_controller.php');
    $usuariosController = new UsuariosController();
    $usuario = $usuariosController->show($_GET['id']);
    ?>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6">
                <label>Nome</label>
                <input type="text" name="nome" value="<?= $usuario['nome'] ?>" class="form-control f_create_edit"
                    required />
            </div>
            <div class="col-md-6">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" value="<?= $usuario['sobrenome'] ?>"
                    class="form-control f_create_edit" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Data de nascimento</label>
                <input type="date" name="data_nascimento" value="<?= $usuario['data_nascimento'] ?>"
                    class="form-control f_create_edit" />
            </div>
            <div class="col-md-4">
                <label>Email</label>
                <input type="email" name="email" value="<?= $usuario['email'] ?>" class="form-control f_create" />
            </div>
            <div class="col-md-4">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control f_create" />
            </div>
        </div>
        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../../controllers/usuarios_controller.php');

    $usuariosController = new UsuariosController();
    $usuario = $usuariosController->update_admin($_GET['id'], $_POST);

    header('Location: index.php?administrador_criado');
}
?>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>