<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <?php
        require_once('../../controllers/enderecos_controller.php');
        require_once('../../controllers/empresas_controller.php');
        $empresasController = new EmpresasController();
        $empresa = $empresasController->show($_GET['id']);
        $enderecosController = new EnderecosController();
        $endereco = $enderecosController->show($empresa['endereco_id']);
    ?>
    <h1>Editar dados da Empresa</h1>
    <hr>
    <form method="POST">
        <div class="row">
            <div class="col-md-6">
                <label>Nome da Empresa</label>
                <input type="text" name="nome_empresa" class="form-control" value="<?= $empresa['nome_empresa']?>"
                    required />
            </div>
            <div class="col-md-6">
                <label>CNPJ</label>
                <input type="text" name="cnpj" class="form-control" value="<?= $empresa['cnpj']?>" required />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $empresa['email']?>" required />
            </div>
            <div class="col-md-6">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required />
            </div>
        </div>
        <label for="">Endereço</label>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label>Rua</label>
                <input type="text" name="rua" class="form-control" value="<?= $endereco['rua']?>" required />
            </div>

            <div class="col-md-6">
                <label>Bairro</label>
                <input type="text" name="bairro" class="form-control" value="<?= $endereco['bairro']?>" required />
            </div>

            <div class="col-md-6">
                <label>Cidade</label>
                <input type="text" name="cidade" class="form-control" value="<?= $endereco['cidade']?>" required />
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <input type="text" name="estado" class="form-control" value="<?= $endereco['estado']?>" required />
            </div>

            <div class="col-md-6">
                <label>CEP</label>
                <input type="text" name="cep" class="form-control" value="<?= $endereco['cep']?>" required />
            </div>

            <div class="col-md-6">
                <label>Complemento</label>
                <input type="text" name="complemento" class="form-control" value="<?= $endereco['complemento']?>" />
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $enderecosController->update($endereco['id'], $_POST);
        $empresasController->update($empresa['id'], $_POST);
        header('Location: index.php');
    }
?>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>