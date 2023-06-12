<?php
require_once('application_controller.php');
require_once('pedidos_controller.php');
class PedidoProdutosController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($idPedido)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedido_produtos WHERE pedido_id = :idPedido');
        $stmt->execute(array(':idPedido' => $idPedido));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create($data, $pedido)        
    {   
        $produtosController = new ProdutosController();
        $pedido_dados = $produtosController->show($data['produto_id']);
        $total = $data['quantidade'] * $pedido_dados['valor'];
        $stmt = $this->pdo->prepare('INSERT INTO pedido_produtos (produto_id, pedido_id, quantidade, valor_total, criado_em) VALUES (:produto_id, :pedido_id, :quantidade, :valor_total, :criado_em)');
        $stmt->execute(array(
            ':produto_id' => $data['produto_id'],
            ':pedido_id' => $pedido,
            ':quantidade' => $data['quantidade'],
            ':valor_total' => $total,
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        $pedidosController = new PedidosController();
        $pedido_valor = $pedidosController->show($pedido);
        $stmt = $this->pdo->prepare('UPDATE pedidos SET valor_total = :valor_total WHERE id = :id');
        $stmt->execute(array(
            ':valor_total' => $pedido_valor['valor_total'] + $total,
            ':id' => $pedido
        ));
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pedido_produtos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE pedido_produtos SET produto_id = :produto_id, quantidade = :quantidade, valor_total = :valor_total WHERE id = :id');
        $stmt->execute(array(
            ':produto_id' => $data['produto_id'],
            ':quantidade' => $data['quantidade'],
            ':valor_total' => $data['valor_total'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM pedido_produtos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}