
<?php
/**
 * Arquivo: CursoController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para gerenciamento de cursos
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../helpers/logs.php';

class CursoController {
  public function index() {
    exigirLogin();

    $conn = conn();
    $result = $conn->query("SELECT * FROM cursos ORDER BY nome ASC");

    $cursos = [];
    while ($row = $result->fetch_assoc()) {
      $cursos[] = $row;
    }

    require_once '../app/views/curso/index.php';
  }

  public function criar() {
    exigirTipo(['admin', 'comum']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $conn = conn();

      $nome = $_POST['nome'];
      $descricao = $_POST['descricao'];

      $stmt = $conn->prepare("INSERT INTO cursos (nome, descricao, usuario_alteracao) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $nome, $descricao, $_SESSION['usuario']['login']);
      $stmt->execute();

      registrarLog("Criou novo curso: {$nome}");

      header('Location: ?url=Curso/index');
      exit;
    }

    require_once '../app/views/curso/criar.php';
  }
}

