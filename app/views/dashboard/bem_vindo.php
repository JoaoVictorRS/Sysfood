<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>

<div class="container">
    <?php
    require_once('../../controllers/sessoes_controller.php');
    $sessoesController = new SessoesController();
    $sessoes = $sessoesController->index();
    if (isset($_SESSION['funcionario']) && isset($_SESSION['funcionario']['cargo']) && ($_SESSION['funcionario']['cargo'] == "Funcionário Comum" || $_SESSION['funcionario']['cargo'] == "Funcionário Cozinha") && !empty($sessoes)) {
        echo '<div style="display: flex; justify-content: flex-end; align-items: center; margin-top: 20px;">
        <label style="margin-right: 20px">Selecione uma Sessão:</label>
            <form action="" method="post" style="display: flex;">
                <select name="sessao" id="sessao" class="form-control" required>';
        foreach ($sessoes as $sessao) {
            echo '<option value="' . $sessao["id"] . '">' . $sessao["nome_sessao"] . '</option>';
        }
        echo '</select>
        <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Selecionar</button>
        </form>
    </div>';
    }
    ?>
    <?php
    require_once('../../controllers/funcionarios_controller.php');
    require_once('../../controllers/produtos_controller.php');
    require_once('../../controllers/categorias_controller.php');
    $funcionariosController = new FuncionariosController();
    $produtosController = new ProdutosController();
    $categoriasController = new CategoriasController();

    $sessoes = $sessoesController->index();
    if (isset($_SESSION['empresa'])) {
        $funcionarios_quantidade = $funcionariosController->index_quantidade($_SESSION['empresa']['id']);
        $sessoes_quantidade = $sessoesController->index_quantidade();
        $produtos_quantidade = $produtosController->index_quantidade();
        $categorias_quantidade = $categoriasController->index_quantidade();
    } elseif (isset($_SESSION['funcionario'])) {
        $funcionarios_quantidade = $funcionariosController->index_quantidade($_SESSION['funcionario']['empresa_id']);
        $sessoes_quantidade = $sessoesController->index_quantidade();
        $produtos_quantidade = $produtosController->index_quantidade();
        $categorias_quantidade = $categoriasController->index_quantidade();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['funcionario']['sessao_id'] = $_POST['sessao'];
        header('Location: ../pedidos/pedidos_na_fila.php');
    }
    ?>
    <?php
    if (isset($_SESSION['empresa']) || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
        require_once('dados_gerais.php');
    } elseif (isset($_SESSION['funcionario']['sessao_id'])) {
        $sessao = $sessoesController->show($_SESSION['funcionario']['sessao_id']);
        echo '<h1>Você está atualmente na sessão ' . $sessao['nome_sessao'] . '!</h1>';
    } elseif (empty($sessoes) && !isset($_SESSION['administrador']) ) {
        echo '<h2 style="color: red" class="text-center">Não existe uma Sessão em andamento no momento!</h2>';
    } elseif (isset($_SESSION['administrador'])) {
        echo '<h1>Área administrativa!</h1>';
    } else {
        echo '<h1>Escolha uma Sessão!</h1>';
    }
    ?>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>