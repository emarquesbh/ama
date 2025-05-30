
<?php
/**
 * Arquivo: Mensagem.php
 * Pasta: app/models/
 * Descrição: Model para tabela de mensagens
 */

class Mensagem {
  private $conn;

  public function __construct($conexao) {
    $this->conn = $conexao;
  }

  public function listarAtivos() {
    $sql = "SELECT * FROM mensagens WHERE status = 'ativo' ORDER BY data_criacao DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  public function buscarPorId($id) {
    $sql = "SELECT * FROM mensagens WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }

  public function inserir($dados) {
    $sql = "INSERT INTO mensagens (titulo, tipo, descricao, video_url, status, usuario_alteracao) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param(
      "ssssss",
      $dados['titulo'],
      $dados['tipo'],
      $dados['descricao'],
      $dados['video_url'],
      $dados['status'],
      $dados['usuario_alteracao']
    );
    $stmt->execute();
  }
}
