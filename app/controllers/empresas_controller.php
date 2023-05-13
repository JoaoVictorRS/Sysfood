<?php
require_once('application_controller.php');
class EmpresasController extends ApplicationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $stmt = $this->pdo->query('SELECT * FROM empresas');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data, $endereco)
    {
        $stmt = $this->pdo->prepare('INSERT INTO empresas (nome_empresa, cnpj, email, senha, endereco_id, criado_em) VALUES
                                    (:nome_empresa, :cnpj, :email, :senha, :endereco_id, :criado_em)');
        $stmt->execute(array(
            ':nome_empresa' => $data['nome_empresa'],
            ':cnpj' => $data['cnpj'],
            ':email' => $data['email'],
            ':senha' => md5($data['senha']),
            ':endereco_id' => $endereco,
            ':criado_em' => date('Y-m-d H:i:s')
        ));
        return $this->pdo->lastInsertId();
    }

    public function show($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM empresas WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE empresas SET nome_empresa = :nome_empresa, cnpj = :cnpj, email = :email, senha =
                                    :senha, endereco_id = :endereco_id WHERE id = :id');
        $stmt->execute(array(
            ':nome_empresa' => $data['nome_empresa'],
            ':cnpj' => $data['cnpj'],
            ':email' => $data['email'],
            ':senha' => $data['senha'],
            ':endereco_id' => $data['endereco_id'],
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM empresas WHERE id = :id');
        $stmt->execute(array(':id' => $id));
    }
}