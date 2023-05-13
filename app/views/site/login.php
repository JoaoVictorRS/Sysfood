<?php
    require_once "../../models/database/conexao.php";

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = [];
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $senha = isset($_POST['senha']) ? md5($_POST['senha']) : '';

        $dbh = Conexao::getInstance();
    

        $query = "SELECT * FROM `sysfood`.`empresas` WHERE email = :email AND senha = :senha";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if($row) {
            $_SESSION['usuario'] = [
                'email' => $row['email'],
            ];
            header('location: ../sessoes/');
        } else {
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