<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <hr>
    <?php
    require_once('../../controllers/funcionarios_controller.php');
    require_once('../../controllers/sessoes_controller.php');
    $funcionariosController = new FuncionariosController();
    $sessoesController = new SessoesController();
    if (isset($_SESSION['empresa'])) {
        $funcionarios_quantidade = $funcionariosController->index_quantidade($_SESSION['empresa']['id']);
        $sessoes_quantidade = $sessoesController->index_quantidade();
    } else {
        $funcionarios_quantidade = $funcionariosController->index_quantidade($_SESSION['funcionario']['empresa_id']);
        $sessoes_quantidade = $sessoesController->index_quantidade();
    }
    ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Total de sessões</h5>
                    <p class="card-text text-center" style="font-size: 24px;"><?= $sessoes_quantidade ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Quantidade de funcionários</h5>
                    <p class="card-text text-center" style="font-size: 24px;">
                        <?= $funcionarios_quantidade ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>