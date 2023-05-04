<?php
class FuncionariosController {
    private $pdo;
  
    public function __construct() {
      // Conectar ao banco de dados usando PDO
      $this->pdo = new PDO('mysql:host=localhost;dbname=sysfood', 'root', '');
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function index() {
        $stmt = $this->pdo->query('SELECT * FROM funcionarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function create($data) {
      $stmt = $this->pdo->prepare('INSERT INTO funcionarios (empresa_id, endereco_id, usuario_id, cargo, cpf, criado_em) VALUES (:empresa_id, :endereco_id, :usuario_id, :cargo, :cpf, :criado_em)');
      $stmt->execute(array(
        ':empresa_id' => $data['empresa_id'],
        ':endereco_id' => $data['endereco_id'],
        ':usuario_id' => $data['usuario_id'],
        ':cargo' => $data['cargo'],
        ':cpf' => $data['cpf'],
        ':criado_em' => date('Y-m-d H:i:s')
      ));
      return $this->pdo->lastInsertId();
    }
  
    public function show($id) {
      $stmt = $this->pdo->prepare('SELECT * FROM funcionarios WHERE id = :id');
      $stmt->execute(array(':id' => $id));
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  
    public function update($id, $data) {
      $stmt = $this->pdo->prepare('UPDATE funcionarios SET empresa_id = :empresa_id, endereco_id = :endereco_id, usuario_id = :usuario_id, cargo = :cargo, cpf = :cpf WHERE id = :id');
      $stmt->execute(array(
        ':empresa_id' => $data['empresa_id'],
        ':endereco_id' => $data['endereco_id'],
        ':usuario_id' => $data['usuario_id'],
        ':cargo' => $data['cargo'],
        ':cpf' => $data['cpf'],
        ':id' => $id
      ));
    }
  
    public function delete($id) {
      $stmt = $this->pdo->prepare('DELETE FROM funcionarios WHERE id = :id');
      $stmt->execute(array(':id' => $id));
    }
}