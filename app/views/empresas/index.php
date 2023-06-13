<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <h1>Empresas</h1>
    <?php
        require_once('../../controllers/empresas_controller.php');
        $empresasController = new EmpresasController();
        $empresas = $empresasController->index();
    ?>
    <?php if (!empty($empresas)) : ?>
    <div class="row" style="margin-top: 20px;">
        <?php foreach ($empresas as $empresa) : ?>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class=" card-body text-center">
                    <h5 class="card-title">Empresa: <?= $empresa['nome_empresa'] ?></h5>
                    <p>Email: <?= $empresa['email'] ?></p>
                    <p>CNPJ: <?= $empresa['cnpj'] ?></p>
                    <div>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir a empresa <?= $usuario['nome'] ?>?')">Excluir
                                arrumar</button>
                        </form>
                        <a href="show.php?id=<?= $empresa['id'] ?>" class="btn btn-sm btn-primary">Pesquisar</a>
                        <a href="edit.php?id=<?= $empresa['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $empresasController->delete($_POST['id_empresa']);
                header("Location: index.php");
            }
        ?>
        <?php endforeach; ?>
        <?php else : ?>
        <div>
            <h5 colspan="6" class="text-center">Nenhuma empresa encontrado.</h5>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>