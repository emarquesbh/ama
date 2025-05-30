
<?php
/**
 * Arquivo: MensagemController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para gerenciamento de mensagens (Reflexão / Palavra do Padre)
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../helpers/logs.php';
require_once __DIR__ . '/../models/Mensagem.php';

class MensagemController {
  private $mensagemModel;

  public function __construct() {
    $this->mensagemModel = new Mensagem(conn());
    exigirLogin();
  }

  public function index() {
    $mensagens = $this->mensagemModel->listarAtivos();
    require_once '../app/views/mensagem/index.php';
  }

  public function criar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $dados = [
        'titulo' => $_POST['titulo'],
        'tipo' => $_POST['tipo'],
        'descricao' => $_POST['descricao'],
        'video_url' => $_POST['video_url'] ?? null,
        'status' => 'ativo',
        'usuario_alteracao' => $_SESSION['usuario']['login']
      ];

      $this->mensagemModel->inserir($dados);
      registrarLog("Criou nova mensagem ({$dados['tipo']})");
      header('Location: ?url=Mensagem/index');
    } else {
      require_once '../app/views/mensagem/criar.php';
    }
  }

  public function ver($id) {
    $mensagem = $this->mensagemModel->buscarPorId($id);
    require_once '../app/views/mensagem/ver.php';
  }
}

