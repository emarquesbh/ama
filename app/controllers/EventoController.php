
<?php
/**
 * Arquivo: EventoController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para gerenciamento de eventos
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../helpers/logs.php';

class EventoController {
  public function index() {
    exigirLogin();

    $conn = conn();
    $result = $conn->query("SELECT * FROM eventos ORDER BY data_evento DESC");

    $eventos = [];
    while ($row = $result->fetch_assoc()) {
      $eventos[] = $row;
    }

    require_once '../app/views/evento/index.php';
  }
}
