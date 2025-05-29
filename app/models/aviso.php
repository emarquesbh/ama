<?php
/**
 * Arquivo: Aviso.php
 * Pasta: app/models/
 * Descrição: Modelo de acesso aos dados da tabela avisos
 */

class Aviso {
    private $conn;

    public function __construct() {
        require '../config/conexao.php';
        $this->conn = $conn;
    }

    public function listarTodos() {
        $sql = "SELECT * FROM avisos ORDER BY data_expiracao DESC";
        return $this->conn->query($sql);
    }

    public function listarAtivos() {
        $sql = "SELECT * FROM avisos 
                WHERE status = 'ativo' AND data_expiracao >= CURDATE()
                ORDER BY destaque DESC, data_expiracao ASC";
        return $this->conn->query($sql);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM avisos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function inserir($dados) {
        $stmt = $this->conn->prepare("INSERT INTO avisos 
            (titulo, descricao, imagem, destaque, status, data_expiracao, usuario_alteracao)
            VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "sssssss",
            $dados['titulo'], $dados['descricao'], $dados['imagem'],
            $dados['destaque'], $dados['status'], $dados['data_expiracao'],
            $dados['usuario']
        );

        return $stmt->execute();
    }
}
