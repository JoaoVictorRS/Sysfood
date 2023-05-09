<?php
require_once('application_controller.php');
class FuncionariosController extends ApplicationController {
 
  
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $stmt = $this->pdo->query('SELECT * FROM funcionarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function create($data, $endereco, $usuario) {
      $stmt = $this->pdo->prepare('INSERT INTO funcionarios (empresa_id, endereco_id, usuario_id, cargo, cpf) VALUES (:empresa_id, :endereco_id, :usuario_id, :cargo, :cpf)');
      $stmt->execute(array(
        ':empresa_id' => 1,
        ':endereco_id' => $endereco,
        ':usuario_id' => $usuario,
        ':cargo' => $data['cargo'],
        ':cpf' => $data['cpf']
      ));
      return $this->pdo->lastInsertId();
    }
  
    public function show($id) {
      $stmt = $this->pdo->prepare('SELECT * FROM funcionarios WHERE id = :id');
      $stmt->execute(array(':id' => $id));
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  
    public function update($id, $data) {
      $stmt = $this->pdo->prepare('UPDATE funcionarios SET cargo = :cargo, cpf = :cpf WHERE id = :id');
      $stmt->execute(array(
        ':cargo' => $data['cargo'],
        ':cpf' => $data['cpf'],
        ':id' => $id
      ));
    }
  
    public function delete($id) {
      $stmt = $this->pdo->prepare('DELETE FROM funcionarios WHERE id = :id');
      $stmt->execute(array(':id' => $id));
      $stmt = $this->pdo->prepare('DELETE FROM usuarios WHERE id = :id');
      $stmt->execute(array(':id' => $id));
    }
}