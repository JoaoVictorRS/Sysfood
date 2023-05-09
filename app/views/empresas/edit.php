<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <form>
        <div class="row">
            <div class="col-md-6">
                <label>Nome da Empresa</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-6">
                <label>CNPJ</label>
                <input type="text" class="form-control" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" />
            </div>
            <div class="col-md-6">
                <label>Senha</label>
                <input type="password" class="form-control" />
            </div>
        </div>
        <label for="">Endereço</label>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label>Rua</label>
                <input type="text" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Bairro</label>
                <input type="text" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Cidade</label>
                <input type="text" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <input type="text" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>CEP</label>
                <input type="text" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Complemento</label>
                <input type="text" class="form-control" />
            </div>
        </div>
        <div style="margin-bottom: 20px;"></div>

        <div class="action_btns">
            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i>
                    Voltar</a></div>
            <div class="one_half last"><a href="#" class="btn btn_red">Registrar</a></div>
        </div>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>