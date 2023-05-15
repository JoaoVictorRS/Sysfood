<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container">
    <?php
        session_start();
        var_dump($_SESSION);
        echo session_id();

        if (empty($_SESSION['usuario'])) {
            header('location: ../index.php?error=Acesso nao autorizado.');
        }
    ?>

</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>