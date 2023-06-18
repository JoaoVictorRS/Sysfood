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
                <input type="text" name="nome_empresa" class="form-control form_edit" value="<?= $empresa['nome_empresa'] ?>"
                    required />
                <span class="edit_span">O nome da empresa deve ter mais de 3 letras</span>
            </div>
            <div class="col-md-6">
                <label>CNPJ</label>
                <input type="text" name="cnpj" class="form-control form_edit" value="<?= $empresa['cnpj'] ?>" maxlength="18" required />
                <span class="edit_span">Ex: xx.xxx.xxx/xxxx-xx</span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control form_edit" value="<?= $empresa['email'] ?>" required />
                <span class="edit_span">Ex:email@gmail.com</span>
            </div>
            <div class="col-md-6">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control form_edit" />
                <span class="edit_span">A senha deve possuir ao menos 8 caracteres<br>Com:<br> 1 Chacaractere Especial<br>1 Chacaractere Numerico</span>
            </div>
        </div>
        <label for="">Endereço</label>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label>CEP</label>
                <input type="text" name="cep" class="form-control form_edit" value="<?= $endereco['cep'] ?>" maxlength="9" required />
                <span class="edit_span">Ex: xxxxx-xxx</span>
            </div>

            <div class="col-md-6">
                <label>Rua</label>
                <input type="text" name="rua" class="form-control form_edit" value="<?= $endereco['rua'] ?>" required />
            </div>

            <div class="col-md-6">
                <label>Bairro</label>
                <input type="text" name="bairro" class="form-control form_edit" value="<?= $endereco['bairro'] ?>" required />
            </div>

            <div class="col-md-6">
                <label>Cidade</label>
                <input type="text" name="cidade" class="form-control form_edit" value="<?= $endereco['cidade'] ?>" required />
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <input type="text" name="estado" class="form-control form_edit" value="<?= $endereco['estado'] ?>" required />
            </div>

            <div class="col-md-6">
                <label>Complemento</label>
                <input type="text" name="complemento" class="form-control form_edit" value="<?= $endereco['complemento'] ?>" />
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="../dashboard/bem_vindo.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $enderecosController->update($endereco['id'], $_POST);
        $empresasController->update($empresa['id'], $_POST);
        if (isset($_GET['empresa'])) {
            header('Location: ../dashboard/bem_vindo.php');
        } else {
            header('Location: index.php');
        }
    }
    ?>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>