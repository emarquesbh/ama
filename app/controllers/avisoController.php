<?php
/**
 * Arquivo: AvisoController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para gerenciamento de avisos
 */

require_once '../app/helpers/auth.php';

class AvisoController extends Controller {
    public function index() {
        exigirLogin();
        $avisoModel = $this->model('Aviso');
        $dados['avisos'] = $avisoModel->listarTodos();
        $this->view('aviso/index', $dados);
    }

    public function criar() {
        exigirTipo(['admin']);

        $avisoModel = $this->model('Aviso');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'] ?? '',
                'descricao' => $_POST['descricao'] ?? '',
                'imagem' => '', // a ser tratado no upload
                'destaque' => isset($_POST['destaque']) ? 1 : 0,
                'status' => $_POST['status'] ?? 'ativo',
                'data_expiracao' => $_POST['data_expiracao'] ?? '',
                'usuario' => $_SESSION['usuario']
            ];

            // Upload (fictício) e imagem tratada com GD futuramente

            $avisoModel->inserir($dados);
            require_once '../app/models/Log.php';
            $logModel = new Log();
            $logModel->registrar([
            'usuario' => $_SESSION['usuario'],
            'acao' => 'criar',
            'tabela' => 'avisos',
            'registro_id' => $this->conn->insert_id
]);


            require_once '../app/models/Log.php';
            $logModel = new Log();
            $logModel->registrar([
                'usuario' => $_SESSION['usuario'],
                'acao' => 'criar',
                'tabela' => 'avisos',
                'registro_id' => $this->conn->insert_id
            ]);

            header('Location: /ama/public/?url=Aviso/index');
            exit;
        }

        $this->view('aviso/criar');
    }
}
