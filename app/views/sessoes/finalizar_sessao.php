<?php
require_once('../../controllers/sessoes_controller.php');
$sessoesController = new SessoesController();
$sessoesController->finalizar_sessao($_GET['id']);
header("Location: index.php?sessao_finalizada");
?>