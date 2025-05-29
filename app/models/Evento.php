<?php
/**
 * Arquivo: Evento.php
 * Pasta: app/models/
 * Descrição: Modelo de acesso aos dados da tabela eventos
 */

class Evento {
    private $conn;

    public function __construct() {
        require '../config/conexao.php';
        $this->conn = $conn;
    }

    public function listarTodos() {
        $sql = "SELECT * FROM eventos ORDER BY data_evento DESC";
        return $this->conn->query($sql);
    }

    public function listarAtivos() {
        $sql = "SELECT * FROM eventos 
                WHERE status = 'ativo' AND data_evento >= CURDATE()
                ORDER BY data_evento ASC";
        return $this->conn->query($sql);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM eventos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function inserir($dados) {
        $stmt = $this->conn->prepare("INSERT INTO eventos 
            (titulo, descricao, local, data_evento, horario, destaque, status, imagem_menor, imagem_maior, imagem01, imagem02, imagem03, usuario_alteracao)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "sssssssssssss",
            $dados['titulo'], $dados['descricao'], $dados['local'],
            $dados['data_evento'], $dados['horario'], $dados['destaque'],
            $dados['status'], $dados['imagem_menor'], $dados['imagem_maior'],
            $dados['imagem01'], $dados['imagem02'], $dados['imagem03'],
            $dados['usuario']
        );

        return $stmt->execute();
    }
}
