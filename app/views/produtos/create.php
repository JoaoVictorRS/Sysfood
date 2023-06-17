<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-4">
    <h1>Criar Produto</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" name="nome_produto" id="nome_produto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do produto:</label>
            <textarea name="descricao" id="descricao" rows="5" class="form-control"></textarea>
        </div>
        <div class="row justify-content-center align-items-center" style="margin-bottom: 20px">
            <div class="col-md-2 text-center">
                <label for="valor">Preço do Produto:</label>
                <input type="text" name="valor" id="valor" class="form-control preco_class" maxlength="8" required>
            </div>
            <div class="col-md-2 text-center">
                <?php
                require_once('../../controllers/categorias_controller.php');
                $categoriasController = new CategoriasController();
                $categorias = $categoriasController->index();
                ?>
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required>
                    <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['id'] ?>">
                        <?= $categoria['nome_categoria'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-8">
                <label for="imagem">Foto do produto:</label>
                <input type="file" name="imagem" id="imagem" class="form-control" required>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php
require_once('../../controllers/produtos_controller.php');

$produtosController = new ProdutosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $_POST["valor"] = str_replace("R$", "", $_POST["valor"]);
    $_POST["valor"] = str_replace(",", ".", $_POST["valor"]);
    if (isset($_SESSION['empresa'])){
        $produtosController->create($_POST, $_SESSION['empresa']['id']);
    } elseif ((isset($_SESSION['funcionario']))){
        $produtosController->create($_POST, $_SESSION['funcionario']['empresa_id']);
    }
    header('Location: index.php');
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>