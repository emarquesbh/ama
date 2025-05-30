
<?php
/**
 * Arquivo: TurmaController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para gerenciamento de turmas
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../helpers/logs.php';

class TurmaController {
  public function index() {
    exigirLogin();

    $conn = conn();
    $result = $conn->query("SELECT * FROM turmas ORDER BY id DESC");

    $turmas = [];
    while ($row = $result->fetch_assoc()) {
      $turmas[] = $row;
    }

    require_once '../app/views/turma/index.php';
  }

  public function criar() {
    exigirTipo(['admin', 'comum']);

    $conn = conn();
    $cursos = $conn->query("SELECT * FROM cursos ORDER BY nome ASC");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $curso_id = $_POST['curso_id'];
      $dia = $_POST['dia'];
      $horario = $_POST['horario'];
      $status = $_POST['status'];

      $stmt = $conn->prepare("INSERT INTO turmas (curso_id, dia, horario, status, usuario_alteracao) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("issss", $curso_id, $dia, $horario, $status, $_SESSION['usuario']['login']);
      $stmt->execute();

      registrarLog("Criou nova turma para curso ID {$curso_id}");

      header('Location: ?url=Turma/index');
      exit;
    }

    require_once '../app/views/turma/criar.php';
  }
}
