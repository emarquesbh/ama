<?php
/**
 * Arquivo: LogsController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para exibir logs de ações realizadas no sistema
 */

require_once '../app/helpers/auth.php';

class LogsController extends Controller {
    public function index() {
        exigirTipo(['admin', 'root']);

        $logModel = $this->model('Log');
        $dados['logs'] = $logModel->listarTodos();
        $this->view('log/index', $dados);
    }
}

