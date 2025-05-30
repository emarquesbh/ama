
<?php
/**
 * Arquivo: Aviso.php
 * Pasta: app/models/
 * Descrição: Model para tabela de avisos
 */

class Aviso {
  private $conn;

  public function __construct($conexao) {
    $this->conn = $conexao;
  }

  public function listarTodos() {
    $sql = "SELECT * FROM avisos ORDER BY data_criacao DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }
}
