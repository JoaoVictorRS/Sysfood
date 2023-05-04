<?php
class PedidoProdutosController
{
    private $pdo;

    public function __construct()
    {
        // Conectar ao banco de dados usando PDO
        $this->pdo = new PDO('mysql:host=localhost;dbname=sysfood', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM pedido_produtos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO pedido_produtos (produto_id, pedido_id, quantidade, valor_total, criado_em) VALUES (:produto_id, :pedido_id, :quantidade, :valor_total, :criado_em)');
        $stmt->execute(array(
            ':produto_id' => $data['produto_id'],
            ':pedido_id' => $data['pedido_id'],
            ':quantidade' => $data['quantidade'],
            ':valor_total' => $data['valor_total'],
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        return $this->pdo->lastInsertId();
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