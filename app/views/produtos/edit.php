<?php require_once '../../views/layouts/user/header.php'; ?>
<?php require_once '../../views/layouts/user/left_menu.php'; ?>
<div class="container mt-5">
    <h1>Editar Produto</h1>
    <hr>
    <?php
    require_once('../../controllers/produtos_controller.php');

    $produtosController = new ProdutosController();
    $produto = $produtosController->show($_GET['id']);

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome_produto">Nome do produto:</label>
            <input type="text" name="nome_produto" id="nome_produto" class="form-control"
                value="<?= $produto['nome_produto'] ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do produto:</label>
            <textarea name="descricao" id="descricao" rows="5"
                class="form-control"><?= $produto['descricao'] ?></textarea>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-2 text-center">
                <label for="valor">Preço do Produto:</label>
                <input maxlength="8" type="text" name="valor" id="valor" class="form-control preco_class"
                    value="<?= $produto['valor'] ?>" required>
            </div>
            <div class="col-md-2 text-center">
                <?php
                require_once('../../controllers/categorias_controller.php');
                $categoriasController = new CategoriasController();
                if (isset($_SESSION['funcionario'])) {
                    $categorias = $categoriasController->index($_SESSION['funcionario']['empresa_id']);
                } elseif (isset($_SESSION['empresa'])) {
                    $categorias = $categoriasController->index($_SESSION['empresa']['id']);
                }
                ?>
                <label for="categoria_id">Categoria:</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required
                    value="<?= $produto['categoria_id'] ?>">
                    <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['id'] ?>">
                        <?= $categoria['nome_categoria'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-8">
                <label for="imagem">Foto do produto:</label>
                <input type="file" name="imagem" id="imagem" class="form-control">
            </div>
        </div>
        <hr>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_POST["valor"] = str_replace("R$", "", $_POST["valor"]);
    $_POST["valor"] = str_replace(",", ".", $_POST["valor"]);

    $produtosController->update($produto['id'], $_POST);
    header('Location: index.php?produto_editado');
}
?>
<?php require_once '../../views/layouts/user/footer.php'; ?>