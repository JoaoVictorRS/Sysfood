<?php
    require_once '../../controllers/enderecos_controller.php';
    require_once '../../controllers/empresas_controller.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Vai para empresa
    $nome_empresa = isset($_POST['nome_empresa']) ? $_POST['nome_empresa'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
    $senha = isset($_POST['senha']) ? md5($_POST['senha']) : '';
    //Vai para endereços
    $rua = isset($_POST['rua']) ? $_POST['rua'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['email'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';


    //Codigo para debug: echo "<pre>".print_r($_POST)."</pre>";

    //Envia a array post para endereços
    $enderecoController = new EnderecosController;
    $endereco = $enderecoController->create($_POST);

    //Envia a array post para empresa
    $empesaController = new EmpresasController;
    $empresa = $empesaController->create($_POST, $endereco);

    //Verifica se as informações colocadas no bd foram cadastradas com sucesso
    $query_empresa = "SELECT * FROM `sysfood`.`empresa` WHERE nome_empresa = :nome_empresa AND senha = :senha AND cnpj = :cnpj";
    $stmt_empresa = $dbh->prepare($query);
    $stmt_empresa->bindParam(':nome', $nome);
    $stmt_empresa->bindParam(':cnpj', $cnpj);
    $stmt_empresa->bindParam(':password', $password);

    $stmt_empresa->execute();
    $row_empresa = $stmt_empresa->fetch(PDO::FETCH_ASSOC);

    $query_endereco = "SELECT * FROM `sysfood`.`endereco` WHERE cep = :cep AND rua = :rua AND bairro = :bairro";
    $stmt_endereco = $dbh->prepare($query);
    $stmt_endereco->bindParam(':cep', $cep);
    $stmt_endereco->bindParam(':rua', $rua);
    $stmt_endereco->bindParam(':bairro', $bairro);

    $stmt_endereco->execute();
    $row_endereco = $stmt_endereco->fetch(PDO::FETCH_ASSOC);

    //Se as informações foram cadastradas corretamente redireciona para a aba de login, se não 
    if ($row_empresa && $row_endereco) {
        //Acho que seria legal que aparecesse uma modal dizendo que o cadastro foi realizado com sucesso e desaparecesse 3 seg dps
        header("Location: localhost/PCC/app/views/index.php");
    }else{
        header('location: localhost/PCC/app/views/index.php?error=Dados Cadastrais Invalidos.');
    }
}


?>

<!--Modal Registrar-->
<div class="user_register box">
    <form method="post" action="">
        <div class="row">
            <div class="col-md-6">
                <label>Nome da Empresa</label>
                <input type="text" id="nome_empresa" class="form-control" />
            </div>
            <div class="col-md-6">
                <label>CNPJ</label>
                <input type="text" id="cnpj" class="form-control" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" id="email" class="form-control" />
            </div>
            <div class="col-md-6">
                <label>Senha</label>
                <input type="password" id="senha" class="form-control" />
            </div>
        </div>
        <label for="">Endereço</label>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label>Rua</label>
                <input type="text" id="rua" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Bairro</label>
                <input type="text" id="bairro" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Cidade</label>
                <input type="text" id="cidade" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Estado</label>
                <input type="text" id="estado" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>CEP</label>
                <input type="text" id="cep" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Complemento</label>
                <input type="text" id="complemento" class="form-control" />
            </div>
        </div>
        <div style="margin-bottom: 20px;"></div>

        <input type="submit" value="enviar">
        </div>
    </form>
</div>