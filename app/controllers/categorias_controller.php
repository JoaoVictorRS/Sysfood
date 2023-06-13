<?php
require_once('application_controller.php');
class CategoriasController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM categorias');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function index_quantidade() {
        $stmt = $this->pdo->query('SELECT * FROM categorias');
        return $stmt->rowCount();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO categorias (nome_categoria) VALUES (:nome_categoria)');
        $stmt->execute(array(
            ':nome_categoria' => $data['nome_categoria']
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM categorias WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE categorias SET nome_categoria = :nome_categoria WHERE id = :id');
        $stmt->execute(array(
            ':nome_categoria' => $data['nome_categoria'],
            ':id' => $id
        ));
    }
    

    public function delete($id)
    {   
        $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE categoria_id = :id');
        $stmt->execute(array(':id' => $id));
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($produtos as $produto) :
            $stmt = $this->pdo->prepare('DELETE FROM pedido_produtos WHERE produto_id = :id');
            $stmt->execute(array(':id' => $produto['id']));
        endforeach;
        $produtos = $this->pdo->prepare('DELETE FROM produtos WHERE categoria_id = :id');
        $produtos->execute(array(':id' => $id));
        $stmt = $this->pdo->prepare('DELETE FROM categorias WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}