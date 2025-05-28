<?php
/**
 * Arquivo: Log.php
 * Pasta: app/models/
 * Descrição: Modelo responsável por buscar registros da tabela de logs.
 */

class Log {
    private $conn;

    public function __construct() {
        require '../config/conexao.php';
        $this->conn = $conn;
    }

    public function listarTodos() {
        $resultado = $this->conn->query("SELECT * FROM logs ORDER BY data_hora DESC");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
