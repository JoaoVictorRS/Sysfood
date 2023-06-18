<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>

<style>
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
</style>
<div class="container">
    <?php
    require_once('../../controllers/categorias_controller.php');
    $categoriasController = new CategoriasController();
    if (isset($_SESSION['funcionario'])) {
        if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
            echo '<div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">
            <div class="flex-grow-1">
                <h1>Produtos</h1>
            </div>';

            $categorias_quantidade = $categoriasController->index_quantidade($_SESSION['funcionario']['empresa_id']);
            if ($categorias_quantidade > 0) {
                echo '<a href="create.php" class="btn btn-primary">Nova Produto</a>';
            } else {
                echo '<h6 style="color: red;">Crie pelo menos uma categoria antes de criar um produto!</h6>';
            }
            echo '</div>';
        } else {
            echo '<div class="flex-grow-1" style="margin-top: 20px;">
                <h1>Produtos</h1>
            </div>';
        }
    } elseif (isset($_SESSION['empresa'])) {
        echo '<div class="d-flex justify-content-between align-items-center" style="margin-top: 20px;">';
        echo ' <div class="flex-grow-1">
                <h1>Produtos</h1>
            </div>';
        $categorias_quantidade = $categoriasController->index_quantidade($_SESSION['empresa']['id']);
        if ($categorias_quantidade > 0) {
            echo '<a href="create.php" class="btn btn-primary">Nova Produto</a>';
        } else {
            echo '<h6 style="color: red;">Crie pelo menos uma categoria antes de criar um produto!</h6>';
        }
        echo '</div>';
    }
    ?>
    <?php
    require_once('../../controllers/produtos_controller.php');
    $produtosController = new ProdutosController();
    if (isset($_SESSION['funcionario'])){
        $produtos = $produtosController->index($_SESSION['funcionario']['empresa_id']);
    } elseif(isset($_SESSION['empresa'])){
        $produtos = $produtosController->index($_SESSION['empresa']['id']);
    }
    ?>
    <div class="row">
        <?php if (!empty($produtos)) : ?>
        <?php foreach ($produtos as $produto) : ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card" style="width: 100%;">
                <img src="../../uploads/<?= $produto['imagem']; ?>" alt="" class="card-img-top" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $produto['nome_produto']; ?></h5>
                    <p class="card-text text-center"><?= $produto['descricao']; ?>.</p>
                    <p class="card-text text-center">Valor: R$<?= $produto['valor']; ?></p>
                </div>
                <div class="d-flex justify-content-center text-center" style="gap: 0.5rem; margin-bottom: 20px;">
                    <?php
                            if (isset($_SESSION['funcionario'])) {
                                if (strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Gerente') == 0 || strcmp($_SESSION['funcionario']['cargo'], 'Funcionário Supervisor') == 0) {
                                    echo '<form action="" method="POST" class="mr-2">';
                                    echo '<input type="hidden" name="id" value="' . $produto['id'] . '">';
                                    echo '<button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm(\'Tem certeza que deseja excluir o produto' . $produto['nome_produto'] . '?\')">Excluir</button>
                    </form>';
                                    echo '<a href="edit.php?id=' . $produto['id'] . '" class="btn btn-sm btn-info">Editar</a>';
                                }
                            } elseif (isset($_SESSION['empresa'])) {
                                echo '<form action="" method="POST" class="mr-2">';
                                echo '<input type="hidden" name="id" value="' . $produto['id'] . '">';
                                echo '<button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm(\'Tem certeza que deseja excluir o produto' . $produto['nome_produto'] . '?\')">Excluir</button>
                    </form>';
                                echo '<a href="edit.php?id=' . $produto['id'] . '" class="btn btn-sm btn-info">Editar</a>';
                            }
                            ?>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else : ?>
        <div>
            <h5 colspan="6" class="text-center">Nenhum produto encontrado.</h5>
        </div>
        <?php endif; ?>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $produtosController->delete($_POST['id']);
        header("Location: index.php?produto_deletado");
    }
    ?>
</div>
<?php require_once '../../views/layouts/user/footer.php'; ?>