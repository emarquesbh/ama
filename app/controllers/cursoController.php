<?php
/**
 * Arquivo: CursoController.php
 * Pasta: app/controllers/
 * Descrição: Controlador responsável pela área de cursos (parte administrativa).
 * Acesso restrito a usuários do tipo 'admin' e 'root'.
 */

require_once '../app/helpers/auth.php';
require_once '../app/helpers/log.php';
registrarLog('Criou novo curso', 'Curso/salvar');

class CursoController extends Controller {

    public function index() {
        exigirLogin();
        exigirTipo(['admin', 'root']);
        $this->view('curso/index');
    }

    public function criar() {
        exigirLogin();
        exigirTipo(['admin', 'root']);
        $this->view('curso/criar');
    }

    public function salvar() {
        exigirLogin();
        exigirTipo(['admin', 'root']);

        // Lógica de salvamento futura: validará $_POST e salvará no banco
        echo "<div class='alert alert-success'>Curso salvo (exemplo de retorno).</div>";
    }
}
