<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-5">
    <h1>Criar Sessão</h1>
    <hr>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome_sessao">Nome da Sessão:</label>
            <input type="text" name="nome_sessao" id="nome_sessao" class="form-control" required>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php
require_once('../../controllers/sessoes_controller.php');

$sessoesController = new SessoesController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['empresa'])){
        $sessoesController->create($_POST,$_SESSION['empresa']['id']);
    } elseif (isset($_SESSION['funcionario'])) {
        $sessoesController->create($_POST,$_SESSION['funcionario']['empresa_id']);
    }
    header('Location: index.php?nova_sessao_criada');
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>