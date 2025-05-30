
<?php
/**
 * Arquivo: Curso.php
 * Pasta: app/models/
 * Descrição: Model para tabela de cursos
 */

class Curso {
  private $conn;

  public function __construct($conexao) {
    $this->conn = $conexao;
  }

  public function listarTodos() {
    $sql = "SELECT * FROM cursos ORDER BY nome ASC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function inserir($nome, $descricao, $usuario) {
    $sql = "INSERT INTO cursos (nome, descricao, usuario_alteracao) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $descricao, $usuario);
    $stmt->execute();
  }
}
