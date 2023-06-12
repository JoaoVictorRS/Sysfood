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
    <form action="" method="post">
        <div class="form-group">
            <label for="nome_produto">Nome do produto:</label>
            <input type="text" name="nome_produto" id="nome_produto" class="form-control"
                value="<?= $produto['nome_produto'] ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do produto:</label>
            <textarea name="descricao" id="descricao" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="valor">Preço do Produto:</label>
            <input type="text" name="valor" id="valor" class="form-control preco_class" value="<?= $produto['valor'] ?>" required>
        </div>
        <div class="form-group">
            <label for="imagem">Foto do produto:</label>
            <input type="file" name="imagem" id="imagem" class="form-control" value="<?= $produto['imagem'] ?>"
                required>
        </div>
        <div class="form-group">
            <?php
            require_once('../../controllers/categorias_controller.php');
            $categoriasController = new CategoriasController();
            $categorias = $categoriasController->index();
            ?>
            <label for="categoria_id">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                <?php foreach ($categorias as $categoria): ?>
                <option value="<?= $categoria['id'] ?>">
                    <?= $categoria['nome_categoria'] ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?php $sessoesController->update($produto['id'], $_POST); ?>
<?php require_once '../../views/layouts/user/footer.php'; ?>