
<?php
/**
 * Arquivo: Evento.php
 * Pasta: app/models/
 * Descrição: Model para tabela de eventos
 */

class Evento {
  private $conn;

  public function __construct($conexao) {
    $this->conn = $conexao;
  }

  public function listarTodos() {
    $sql = "SELECT * FROM eventos ORDER BY data_evento DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }
}

