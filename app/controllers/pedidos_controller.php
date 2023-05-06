<?php
require_once('application_controller.php');
class PedidosController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM pedidos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data, $id_sessao)
    {
        $stmt = $this->pdo->prepare('INSERT INTO pedidos (descricao, nome_cliente, hora_inicio, hora_fim, sessao_id, valor_total, status_pedido) VALUES (:descricao, :nome_cliente, :hora_inicio, :hora_fim, :sessao_id, :valor_total, :status_pedido)');
        $stmt->execute(array(
            ':descricao' => $data['descricao'],
            ':nome_cliente' => $data['nome_cliente'],
            ':hora_inicio' => $data['hora_inicio'],
            ':hora_fim' => $data['hora_fim'],
            ':sessao_id' => $data['sessao_id'] = $id_sessao,
            ':valor_total' => $data['valor_total'],
            ':status_pedido' => $data['status_pedido']
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function show_pedidos($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedidos WHERE sessao_id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->pdo->prepare('UPDATE pedidos SET descricao = :descricao, nome_cliente = :nome_cliente, hora_inicio = :hora_inicio, hora_fim = :hora_fim, valor_total = :valor_total, status_pedido = :status_pedido WHERE id = :id');
            $stmt->execute(array(
                ':descricao' => $data['descricao'],
                ':nome_cliente' => $data['nome_cliente'],
                ':hora_inicio' => $data['hora_inicio'],
                ':hora_fim' => $data['hora_fim'],
                ':valor_total' => $data['valor_total'],
                ':status_pedido' => $data['status_pedido'],
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
            $stmt = $this->pdo->prepare('DELETE FROM pedidos WHERE id = :id');
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
            exit;
        }
    }
}