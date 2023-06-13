<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <h1>Cadastrar Adiministrador</h1>
    <hr>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control f_create_edit" required />
            </div>
            <div class="col-md-6">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control f_create_edit" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label>Email</label>
                <input type="email" name="email" class="form-control f_create" />
            </div>
            <div class="col-md-4">
                <label>Data de nascimento</label>
                <input type="date" name="data_nascimento" class="form-control f_create_edit" />
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
        require_once('../../controllers/administradores_controller.php');
        
        $usuariosController = new UsuariosController();
        $usuario = $usuariosController->create($_POST);
        $administradorController = new AdministradoresController();
        $administradorController->create($usuario);

        header('Location: index.php?administrador_criado');
    }
?>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>