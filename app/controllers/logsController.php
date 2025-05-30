
<?php
/**
 * Arquivo: LogsController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para exibição dos logs do sistema
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/auth.php';

class LogsController {
  public function index() {
    exigirTipo(['admin', 'root']);

    $conn = conn();
    $result = $conn->query("SELECT * FROM logs ORDER BY data_criacao DESC LIMIT 100");

    $logs = [];
    while ($row = $result->fetch_assoc()) {
      $logs[] = $row;
    }

    require_once '../app/views/logs/index.php';
  }
}

