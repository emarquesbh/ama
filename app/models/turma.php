
<?php
/**
 * Arquivo: Turma.php
 * Pasta: app/models/
 * Descrição: Model para tabela de turmas
 */

class Turma {
  private $conn;

  public function __construct($conexao) {
    $this->conn = $conexao;
  }

  public function listarTodas() {
    $sql = "SELECT * FROM turmas ORDER BY id DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function inserir($curso_id, $dia, $horario, $status, $usuario) {
    $sql = "INSERT INTO turmas (curso_id, dia, horario, status, usuario_alteracao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("issss", $curso_id, $dia, $horario, $status, $usuario);
    $stmt->execute();
  }
}

