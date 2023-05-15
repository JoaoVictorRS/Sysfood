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
        $stmt = $this->pdo->prepare('INSERT INTO pedidos (descricao, nome_cliente, sessao_id, valor_total) VALUES (:descricao, :nome_cliente, :sessao_id, :status_pedido)');
        $stmt->execute(array(
            ':descricao' => $data['descricao'],
            ':nome_cliente' => $data['nome_cliente'],
            ':sessao_id' => $data['sessao_id'] = $id_sessao,
            ':status_pedido' => $data['status_pedido'] = "Na fila"
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
        $stmt = $this->pdo->prepare('UPDATE pedidos SET descricao = :descricao, nome_cliente = :nome_cliente WHERE id = :id');
        $stmt->execute(array(
            ':descricao' => $data['descricao'],
            ':nome_cliente' => $data['nome_cliente'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {   
            $stmt = $this->pdo->prepare('DELETE FROM pedidos WHERE id = :id');
            $stmt->execute(array(':id' => $id));
    }   
}