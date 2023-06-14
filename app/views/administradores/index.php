<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="flex-grow-1">
            <h1>Administradores</h1>
        </div>
        <a href="create.php" class="btn btn-primary">Novo administrador</a>
    </div>
    <?php
        require_once('../../controllers/usuarios_controller.php');
        require_once('../../controllers/administradores_controller.php');
        $usuariosController = new UsuariosController();
        $administradoresController = new AdministradoresController();
        
        $administradores = $administradoresController->index(isset($_SESSION['administrador']));
    ?>
    <?php if (!empty($administradores)) : ?>
    <div class="row" style="margin-top: 20px;">
        <?php foreach ($administradores as $administrador) : ?>
        <?php $usuario = $usuariosController->show($administrador['usuario_id']) ?>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class=" card-body text-center">
                    <h5 class="card-title">Nome: <?= $usuario['nome'] ?></h5>
                    <p>Email: <?= $usuario['email'] ?></p>
                    <div>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id_admin" value="<?= $administrador['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir o administrador <?= $usuario['nome'] ?>?')">Excluir</button>
                        </form>
                        <a href="edit.php?id=<?= $administrador['usuario_id'] ?>" class="btn btn-sm btn-info">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $administradoresController->delete($_POST['id_admin']);
                header("Location: index.php");
            }
        ?>
        <?php endforeach; ?>
        <?php else : ?>
        <div>
            <h5 colspan="6" class="text-center">Nenhum adiministrador encontrado.</h5>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>