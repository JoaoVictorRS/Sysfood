<?php
    require_once "../../models/database/conexao.php";

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = [];
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        //função md5 temporariamente removida
        $senha = isset($_POST['senha']) ? md5($_POST['senha']) : '';

        $dbh = Conexao::getInstance();
        
        //Query de verificação se é uma empresa
        $query = "SELECT * FROM `sysfood`.`empresas` WHERE email = :email AND senha = :senha";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Query de verificação se é um funcionario
        $query_F = "SELECT * FROM `sysfood`.`funcionarios` INNER JOIN `sysfood`.`usuarios` ON `funcionarios`.`usuario_id` = `usuarios`.`id` WHERE email = :email AND senha = :senha";
        $stmt_F = $dbh->prepare($query_F);
        $stmt_F->bindParam(':email', $email);
        $stmt_F->bindParam(':senha', $senha);

        $stmt_F->execute();
        $row_F = $stmt_F->fetch(PDO::FETCH_ASSOC);

        if($row){
            $_SESSION['usuario'] = [
                'email' => $row['email'],
            ];
            header('location: ../dashboard/bem_vindo.php');
        }else if ($row_F) {
            //Query que pega o cargo do otario
            $query_cargo = "SELECT cargo FROM `sysfood`.`funcionarios` WHERE id = :id";
            $stmt_cargo = $dbh->prepare($query_cargo);
            $stmt_cargo->bindParam(':id', $row_F['id']);

            $stmt_cargo->execute();
            $row_cargo = $stmt_cargo->fetch(PDO::FETCH_ASSOC);

            $_SESSION['usuario'] = [
                'email' => $row_F['email'],
                'cargo' => $row_cargo['cargo']
            ];
            
            //Aqui vai ter uma condicional pra ver qual pagina ser redirecionado, tipo, adm vai pra pag adm e funcionario comum vai pra funcionario comum
            header('location: ../dashboard/bem_vindo.php');
        }else{
            session_destroy();
            header('location: ../index.php?error=Usuário ou senha inválidos.');
        }

    }
?>
<!--POP LOGIN-->
<div class="overlay"></div>
<div class="modal">

    <div class="div_login">
        <form action="index.php" method="post">
            <h1>Login</h1><br>
            <input type="text" name="nome" placeholder="Nome" class="input" required autofocus>
            <br><br>
            <input type="password" name="password" placeholder="Senha" class="input" required>
            <br><br>
            <button class="button">Enviar</button>
        </form>
    </div>

</div>
<!--FIM POP LOGIN-->