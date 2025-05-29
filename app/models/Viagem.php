<?php
/**
 * Arquivo: Viagem.php
 * Pasta: app/models/
 * Descrição: Modelo de acesso aos dados da tabela viagens
 */

class Viagem {
    private $conn;

    public function __construct() {
        require '../config/conexao.php';
        $this->conn = $conn;
    }

    public function listarTodas() {
        $sql = "SELECT * FROM viagens ORDER BY data_saida DESC";
        return $this->conn->query($sql);
    }

    public function listarAtivas() {
        $sql = "SELECT * FROM viagens 
                WHERE status = 'ativo' AND data_saida >= CURDATE()
                ORDER BY data_saida ASC";
        return $this->conn->query($sql);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM viagens WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function inserir($dados) {
        $stmt = $this->conn->prepare("INSERT INTO viagens 
            (titulo, destino, data_saida, data_retorno, valor, status, usuario_alteracao)
            VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "sssssss",
            $dados['titulo'], $dados['destino'], $dados['data_saida'],
            $dados['data_retorno'], $dados['valor'], $dados['status'],
            $dados['usuario']
        );

        return $stmt->execute();
    }
}
