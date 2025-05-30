
<?php
/**
 * Arquivo: Viagem.php
 * Pasta: app/models/
 * Descrição: Model para tabela de viagens
 */

class Viagem {
  private $conn;

  public function __construct($conexao) {
    $this->conn = $conexao;
  }

  public function listarTodas() {
    $sql = "SELECT * FROM viagens ORDER BY data_saida DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function inserir($dados) {
    $sql = "INSERT INTO viagens (titulo, destino, data_saida, data_retorno, valor, status, usuario_alteracao) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param(
      "sssssss",
      $dados['titulo'],
      $dados['destino'],
      $dados['data_saida'],
      $dados['data_retorno'],
      $dados['valor'],
      $dados['status'],
      $dados['usuario_alteracao']
    );
    $stmt->execute();
  }
}

