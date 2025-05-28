<?php
/**
 * Arquivo: Turma.php
 * Pasta: app/models/
 * Descrição: Modelo de dados para turmas associadas aos cursos.
 */

class Turma {
    private $conn;

    public function __construct() {
        require '../config/conexao.php';
        $this->conn = $conn;
    }

    public function salvar($dados) {
        $stmt = $this->conn->prepare("INSERT INTO turmas (curso_id, dia, horario, status, usuario_criacao) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $dados['curso_id'], $dados['dia'], $dados['horario'], $dados['status'], $dados['usuario']);
        return $stmt->execute();
    }
}
