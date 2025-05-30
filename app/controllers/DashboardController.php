<?php
/**
 * Arquivo: DashboardController.php
 * Pasta: app/controllers/
 * Descrição: Controlador do painel administrativo (dashboard)
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/auth.php';

class DashboardController {
  public function index() {
    exigirLogin();
    require_once '../app/views/dashboard/index.php';
  }
}
