<?php
require_once('application.php');
class ProdutosController extends Application
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM produtos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO produtos (nome_produto, descricao, valor, imagem, categoria_id, criado_em) VALUES (:nome_produto, :descricao, :valor, :imagem, :categoria_id, :criado_em)');
        $stmt->execute(array(
            ':nome_produto' => $data['nome_produto'],
            ':descricao' => $data['descricao'],
            ':valor' => $data['valor'],
            ':imagem' => $data['imagem'],
            ':categoria_id' => $data['categoria_id'],
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE produtos SET nome_produto = :nome_produto, descricao = :descricao, valor = :valor, imagem = :imagem, categoria_id = :categoria_id WHERE id = :id');
        $stmt->execute(array(
            ':nome_produto' => $data['nome_produto'],
            ':descricao' => $data['descricao'],
            ':valor' => $data['valor'],
            ':imagem' => $data['imagem'],
            ':categoria_id' => $data['categoria_id'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM produtos WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}