
<?php
/**
 * Arquivo: ViagemController.php
 * Pasta: app/controllers/
 * Descrição: Controlador para gerenciamento de viagens
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../helpers/logs.php';
require_once __DIR__ . '/../models/Viagem.php';

class ViagemController {
  private $viagemModel;

  public function __construct() {
    $this->viagemModel = new Viagem(conn());
    exigirLogin();
  }

  public function index() {
    $viagens = $this->viagemModel->listarTodas();
    require_once '../app/views/viagem/index.php';
  }

  public function criar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $dados = [
        'titulo' => $_POST['titulo'],
        'destino' => $_POST['destino'],
        'data_saida' => $_POST['data_saida'],
        'data_retorno' => $_POST['data_retorno'],
        'valor' => $_POST['valor'],
        'status' => $_POST['status'],
        'usuario_alteracao' => $_SESSION['usuario']['login']
      ];

      $this->viagemModel->inserir($dados);
      registrarLog("Criou nova viagem: {$dados['titulo']}");
      header('Location: ?url=Viagem/index');
    } else {
      require_once '../app/views/viagem/criar.php';
    }
  }
}

