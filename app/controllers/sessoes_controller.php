<?php
require_once('application_controller.php');
class SessoesController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM sessoes');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO sessoes (nome_sessao, status_sessao) VALUES (:nome_sessao, :status_sessao)');
        $stmt->execute(array(
            ':nome_sessao' => $data['nome_sessao'],
            ':status_sessao' => $data['status_sessao'] = 'Em andamento'
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM sessoes WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->pdo->prepare('UPDATE sessoes SET nome_sessao = :nome_sessao, hora_inicio = :hora_inicio, hora_fim = :hora_fim, status_sessao = :status_sessao WHERE id = :id');
            $stmt->execute(array(
                ':nome_sessao' => $data['nome_sessao'],
                ':hora_inicio' => $data['hora_inicio'],
                ':hora_fim' => $data['hora_fim'],
                ':status_sessao' => $data['status_sessao'],
                ':id' => $id
            ));

            if ($stmt->rowCount() > 0) {
                header("Location: index.php");
                exit;
            } else {
                // Caso contrário, exibe uma mensagem de erro
                $_SESSION['message'] = 'Erro ao excluir sessão.';
                $_SESSION['message_type'] = 'error';
            }
        }
    }

    public function delete($id)
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->pdo->prepare('DELETE FROM sessoes WHERE id = :id');
            $stmt->execute(array(':id' => $id));
            
            if ($stmt->rowCount() > 0) {
                // Caso a sessão tenha sido excluída com sucesso
                $_SESSION['message'] = 'Sessão excluída com sucesso.';
                $_SESSION['message_type'] = 'success';
            } else {
                // Caso contrário, exibe uma mensagem de erro
                $_SESSION['message'] = 'Erro ao excluir sessão.';
                $_SESSION['message_type'] = 'error';
            }
            header("Location: index.php");
            die();
        }
    }
}