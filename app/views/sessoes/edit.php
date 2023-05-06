<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Editar Sessão</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Editar Sessão</h1>
        <hr>
        <?php
            require_once('../../controllers/sessoes_controller.php');
            
            $sessoesController = new SessoesController();
            $sessao = $sessoesController->show($_GET['id']);
            
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome_sessao">Nome da Sessão:</label>
                <input type="text" name="nome_sessao" id="nome_sessao" class="form-control"
                    value="<?php echo $sessao['nome_sessao'] ?>" required>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de Início:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control"
                    value="<?php echo $sessao['hora_inicio'] ?>" required>
            </div>
            <div class="form-group">
                <label for="hora_fim">Hora de Fim:</label>
                <input type="time" name="hora_fim" id="hora_fim" class="form-control"
                    value="<?php echo $sessao['hora_fim'] ?>" required>
            </div>
            <div class="form-group">
                <label for="status_sessao">Status da Sessão:</label>
                <select name="status_sessao" id="status_sessao" class="form-control"
                    value="<?php echo $sessao['status_sessao'] ?>" required>
                    <option value="Inativo">Finalizada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <?php $sessoesController->update($sessao['id'], $_POST); ?>
</body>

</html>