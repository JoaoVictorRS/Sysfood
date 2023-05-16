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
        $stmt = $this->pdo->query('SELECT * FROM sessoes WHERE status_sessao = "em andamento"');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function index_quantidade() {
        $stmt = $this->pdo->query('SELECT * FROM sessoes');
        return $stmt->rowCount();
    }

    public function index_finalizado()
    {
        $stmt = $this->pdo->query('SELECT * FROM sessoes WHERE status_sessao = "finalizada"');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function finalizar_sessao($id){
        $stmt = $this->pdo->prepare('UPDATE sessoes SET status_sessao = :status_sessao, hora_fim = :hora_fim WHERE id = :id');
        $stmt->execute(array(
            ':status_sessao' => 'finalizada',
            ':hora_fim' => date('H:i:s'),
            ':id' => $id
        ));
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO sessoes (nome_sessao, hora_inicio, status_sessao) VALUES (:nome_sessao, :hora_inicio, :status_sessao)');
        $stmt->execute(array(
            ':nome_sessao' => $data['nome_sessao'],
            ':hora_inicio' => date('H:i:s'),
            ':status_sessao' => 'Em andamento'
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
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->pdo->prepare('UPDATE sessoes SET nome_sessao = :nome_sessao, hora_inicio = :hora_inicio, hora_fim = :hora_fim, status_sessao = :status_sessao WHERE id = :id');
            $stmt->execute(array(
                ':nome_sessao' => $data['nome_sessao'],
                ':hora_inicio' => $data['hora_inicio'],
                ':hora_fim' => $data['hora_fim'],
                ':status_sessao' => $data['status_sessao'],
                ':id' => $id
            ));
        }
    }

    public function delete($id)
    {   
        $pedidos = $this->pdo->prepare('SELECT id FROM pedidos WHERE sessao_id = :id');
        $pedidos->execute(array(':id' => $id));
        $pedidos_total = $pedidos->fetchAll(PDO::FETCH_ASSOC);
        foreach($pedidos_total as $pedido_cada) :
            $deletar_pedidos = $this->pdo->prepare('DELETE FROM pedido_produtos WHERE pedido_id = :id');
            $deletar_pedidos->execute(array(':id' => $pedido_cada['id']));
        endforeach;
        $pedido = $this->pdo->prepare('DELETE FROM pedidos WHERE sessao_id = :id');
        $pedido->execute(array(':id' => $id));
        $stmt = $this->pdo->prepare('DELETE FROM sessoes WHERE id = :id');
        $stmt->execute(array(':id' => $id));

        header("Location: index.php");
        exit;
    }
}