<?php
/**
 * Arquivo: Log.php
 * Pasta: app/models/
 * Descrição: Modelo para registro de ações no sistema
 */

class Log {
    private $conn;

    public function __construct() {
        require '../config/conexao.php';
        $this->conn = $conn;
    }

    public function registrar($dados) {
        $stmt = $this->conn->prepare("INSERT INTO logs (usuario, acao, tabela_afetada, registro_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $dados['usuario'], $dados['acao'], $dados['tabela'], $dados['registro_id']);
        return $stmt->execute();
    }
}
