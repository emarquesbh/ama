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

    $dados = [
        'nome' => $_POST['nome'],
        'descricao' => $_POST['descricao'],
        'dia' => $_POST['dia'],
        'horario' => $_POST['horario'],
        'usuario' => $_SESSION['usuario']
    ];

    $modelo = $this->model('Curso');
    $modelo->salvar($dados);

    require_once '../app/helpers/log.php';
    registrarLog('Criou curso: ' . $dados['nome'], 'Curso/salvar');

    header('Location: /ama/public/?url=Curso/index');
}

}
