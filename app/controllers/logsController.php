<?php
/**
 * Arquivo: LogsController.php
 * Pasta: app/controllers/
 * Descrição: Controlador responsável pela visualização dos registros de log do sistema.
 * Acesso restrito a usuários do tipo 'root'.
 */

require_once '../app/helpers/auth.php';

class LogsController extends Controller {

    public function index() {
        exigirLogin();
        exigirTipo(['root']);

        $logModel = $this->model('Log');
        $logs = $logModel->listarTodos();

        $this->view('logs/index', ['logs' => $logs]);
    }
}
