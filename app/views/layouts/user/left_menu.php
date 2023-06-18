<?php
if (!$_SESSION) {
    header('Location: ../index.php');
}
?>
<ul class="menu-inner py-1">
    <li class="menu-item">
        <a href="../dashboard/bem_vindo.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <?php
    if (isset($_SESSION['administrador'])) {
        echo '<li class="menu-item">
        <a href="../administradores/index.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Administradores</div>
        </a>
    </li>';
        echo '<li class="menu-item">
        <a href="../empresas/index.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Empresas</div>
        </a>
    </li>';
    }
    ?>

    <?php
    if (isset($_SESSION['empresa']) || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
        echo '<li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Sessões</div>
                </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="../sessoes/index.php" class="menu-link">
                                <div data-i18n="Without menu">Sessões em andamento</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="../sessoes/index_finalizado.php" class="menu-link">
                                <div data-i18n="Without navbar">Sessões finalizadas</div>
                            </a>
                        </li>
                    </ul>
                </li>';
        echo '<li class="menu-item">
        <a href="../funcionarios/index.php" class="menu-link">';
        echo '<i class="' . 'menu-icon tf-icons bx bxs-user-account' . '"></i>';
        echo '<div>Funcionários</div>
                </a>
            </li>';
        echo '<li class="menu-item">
        <a href="../produtos/index.php" class="menu-link">';
        echo '<i class="' . 'menu-icon tf-icons bx bx-food-menu' . '"></i>';
        echo '<div>Produtos</div>
            </a>
        </li>';
        echo '<li class="menu-item">
        <a href="../categorias/index.php" class="menu-link">';
        echo '<i class="' . 'menu-icon tf-icons bx bx-receipt' . '"></i>';
        echo '<div>Categorias</div>
            </a>
        </li>';
    }
    ?>
    <?php
    if (isset($_SESSION['funcionario'])) {
        if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Comum') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Cozinha') == 0) {
            echo '<li class="menu-item" id="prod_func">
            <a href="../produtos/index.php" class="menu-link">';
            echo '<i class="' . 'menu-icon tf-icons bx bx-food-menu' . '"></i>';
            echo '<div>Produtos</div>
                </a>
            </li>';
            echo '<li class="menu-item menu-func" id="cat_func">
            <a href="../categorias/index.php" class="menu-link">';
            echo '<i class="' . 'menu-icon tf-icons bx bx-receipt' . '"></i>';
            echo '<div>Categorias</div>
                </a>
            </li>';
        }
    }
    ?>
    <?php
    if (isset($_SESSION['funcionario']['sessao_id'])) {
        echo '<li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">';
        echo '<i class="' . 'menu-icon tf-icons bx bxs-user-account' . '"></i>';
        echo '<div data-i18n="Layouts">Pedidos</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="../pedidos/pedidos_na_fila.php" class="menu-link">
                    <div data-i18n="Without menu">Pedidos na fila</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="../pedidos/pedidos_em_preparacao.php" class="menu-link">
                    <div data-i18n="Without navbar">Pedidos em andamento</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="../pedidos/pedidos_finalizados.php" class="menu-link">
                    <div data-i18n="Without navbar">Pedidos finalizados</div>
                </a>
            </li>
        </ul>
    </li>';
    }
    ?>

</ul>
</aside>


<div class="layout-page">


    <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                        aria-label="Search..." />
                </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <i class='bx bxs-user bx-md'></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <i class='bx bxs-user bx-lg'></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <?php
                                        require_once('../../controllers/usuarios_controller.php');
                                        if (isset($_SESSION['empresa'])) {
                                            require_once('../../controllers/empresas_controller.php');
                                            $empresasController = new EmpresasController();
                                            $empresa = $empresasController->show($_SESSION['empresa']['id']);
                                            echo '<span class="fw-semibold d-block">' . $empresa['nome_empresa'] . '</span>';
                                            echo '<small class="text-muted">Empresa - Plano Básico</small>';
                                        } elseif (isset($_SESSION['funcionario'])) {
                                            $usuariosController = new UsuariosController();
                                            $funcionario = $usuariosController->show($_SESSION['funcionario']['usuario_id']);
                                            echo '<span class="fw-semibold d-block">
                                            ' . $funcionario['nome'] . '
                                            </span>
                                            ';
                                            echo '<small class="text-muted">' . $_SESSION['funcionario']['cargo'] . '</small>';
                                        } elseif (isset($_SESSION['administrador'])) {
                                            $usuariosController = new UsuariosController();
                                            $administrador = $usuariosController->show($_SESSION['administrador']['usuario_id']);
                                            echo '<span class="fw-semibold d-block">
                                            ' . $administrador['nome'] . '
                                            </span>
                                            ';
                                            echo '<small class="text-muted">Administrador</small>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <?php
                            if (isset($_SESSION['funcionario'])) {
                                echo '<a class="dropdown-item"
                            href="../funcionarios/usuario_update.php?id=' . $_SESSION['funcionario']['id'] . '">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Meu Perfil</span>
                            </a>';
                            } elseif (isset($_SESSION['empresa'])) {
                                echo '<a class="dropdown-item"
                            href="../empresas/edit.php?id=' . $_SESSION['empresa']['id'] . '&empresa=empresa">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Meu Perfil</span>
                            </a>';
                            } elseif (isset($_SESSION['administrador'])) {
                                echo '<a class="dropdown-item"
                            href="../administradores/edit.php?id=' . $_SESSION['administrador']['usuario_id'] . '">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Meu Perfil</span>
                            </a>';
                            }

                            ?>
                        </li>
                        <?php
                        if (isset($_SESSION['empresa'])) {
                            echo ' <li>
                            <a class="dropdown-item" href="#">
                                <span class="d-flex align-items-center align-middle">
                                    <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                    <span class="flex-grow-1 align-middle">Meu Plano</span>
                                    <span
                                        class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20"></span>
                                </span>
                            </a>
                        </li>
                        ';
                        }
                        ?>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Sair</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>