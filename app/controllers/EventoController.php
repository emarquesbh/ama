<?php
/**
 * Arquivo: EventoController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para gerenciamento de eventos
 */

require_once '../app/helpers/auth.php';

class EventoController extends Controller {
    public function index() {
        exigirLogin();
        $eventoModel = $this->model('Evento');
        $dados['eventos'] = $eventoModel->listarTodos();
        $this->view('evento/index', $dados);
    }

    public function criar() {
        exigirTipo(['admin', 'root']);

        $eventoModel = $this->model('Evento');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'] ?? '',
                'descricao' => $_POST['descricao'] ?? '',
                'local' => $_POST['local'] ?? '',
                'data_evento' => $_POST['data_evento'] ?? '',
                'horario' => $_POST['horario'] ?? '',
                'destaque' => isset($_POST['destaque']) ? 1 : 0,
                'status' => $_POST['status'] ?? 'ativo',
                'imagem_menor' => '', 'imagem_maior' => '',
                'imagem01' => '', 'imagem02' => '', 'imagem03' => '',
                'usuario' => $_SESSION['usuario']
            ];

            // Tratamento de upload (fictício por enquanto)
            // Imagens devem ser tratadas com GD futuramente

            $eventoModel->inserir($dados);

            require_once '../app/models/Log.php';

            $logModel = new Log();
            $logModel->registrar([
            'usuario' => $_SESSION['usuario'],
            'acao' => 'criar',
            'tabela' => 'eventos',
            'registro_id' => $this->conn->insert_id
]);

            header('Location: /ama/public/?url=Evento/index');
            exit;
        }

        $this->view('evento/criar');
    }
}
