<?php
require_once('application_controller.php');

class UsuariosController extends ApplicationController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM usuarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO usuarios (nome, sobrenome, data_nascimento, email, senha) VALUES (:nome, :sobrenome, :data_nascimento, :email, :senha)');
        $stmt->execute(array(
            ':nome' => $data['nome'],
            ':sobrenome' => $data['sobrenome'],
            ':data_nascimento' => $data['data_nascimento'],
            ':email' => $data['email'],
            ':senha' => 123456
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, data_nascimento = :data_nascimento, email = :email WHERE id = :id');
        $stmt->execute(array(
            ':nome' => $data['nome'],
            ':sobrenome' => $data['sobrenome'],
            ':data_nascimento' => $data['data_nascimento'],
            ':email' => $data['email'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM usuarios WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}