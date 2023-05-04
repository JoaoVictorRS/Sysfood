<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Criar Sessão</title>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Criar Sessão</h1>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome_sessao">Nome da Sessão:</label>
                <input type="text" name="nome_sessao" id="nome_sessao" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hora_inicio">Hora de Início:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hora_fim">Hora de Fim:</label>
                <input type="time" name="hora_fim" id="hora_fim" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status_sessao">Status da Sessão:</label>
                <select name="status_sessao" id="status_sessao" class="form-control" required>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <?php
    require_once('../../controllers/sessoes.php');
    
    $sessoesController = new SessoesController();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sessoesController->create($_POST);
        header('Location: index.php');
        exit();
    }
    ?>
</body>

</html>