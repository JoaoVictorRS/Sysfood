<?php
require_once('application.php');
class CategoriaController extends Application
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

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO categorias (nome_categoria, criado_em) VALUES (:nome_categoria, :criado_em)');
        $stmt->execute(array(
            ':nome_categoria' => $data['nome_categoria'],
            ':criado_em' => date('Y-m-d H:i:s')
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
        $stmt = $this->pdo->prepare('DELETE FROM categorias WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}