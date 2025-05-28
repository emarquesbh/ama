<?php
/**
 * Arquivo: TurmaController.php
 * Pasta: app/controllers/
 * Descrição: Controlador responsável pela gestão de turmas vinculadas aos cursos.
 * Acesso restrito a usuários do tipo 'admin' e 'root'.
 */

require_once '../app/helpers/auth.php';
require_once '../app/helpers/log.php';
registrarLog('Criou nova turma', 'Turma/salvar');


class TurmaController extends Controller {

    public function index($curso_id = null) {
        exigirLogin();
        exigirTipo(['admin', 'root']);

        $this->view('turma/index', ['curso_id' => $curso_id]);
    }

    public function criar($curso_id) {
        exigirLogin();
        exigirTipo(['admin', 'root']);

        $this->view('turma/criar', ['curso_id' => $curso_id]);
    }

    public function salvar() {
        exigirLogin();
        exigirTipo(['admin', 'root']);

        $dados = [
            'curso_id' => $_POST['curso_id'],
            'dia' => $_POST['dia'],
            'horario' => $_POST['horario'],
            'status' => $_POST['status'],
            'usuario' => $_SESSION['usuario']
        ];

        $modelo = $this->model('Turma');
        $modelo->salvar($dados);

        header('Location: /ama/public/?url=Turma/index/' . $dados['curso_id']);
    }
}
