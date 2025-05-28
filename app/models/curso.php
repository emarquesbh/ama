<?php
/**
 * Arquivo: Curso.php
 * Pasta: app/models/
 * Descrição: Modelo de dados para cursos e turmas. Responsável por interagir com a tabela 'cursos' no banco de dados.
 */

class Curso {
    private $conn;

    public function __construct() {
        require '../config/conexao.php';
        $this->conn = $conn;
    }

    public function salvar($dados) {
        $stmt = $this->conn->prepare("INSERT INTO cursos (nome, descricao, dia, horario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $dados['nome'], $dados['descricao'], $dados['dia'], $dados['horario']);
        return $stmt->execute();
    }
}
