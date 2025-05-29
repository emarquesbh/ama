// Aqui começa código 4: app/controllers/LoginController.php
// Pasta: app/controllers/

<?php
/**
 * Arquivo: LoginController.php
 * Pasta: app/controllers/
 * Descrição: Controlador responsável pelo login, autenticação e logout.
 */

class LoginController extends Controller {
    public function index() {
        $this->view('login/index');
    }

    public function autenticar() {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        require '../config/conexao.php';

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? LIMIT 1");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $user = $resultado->fetch_assoc();
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['usuario'] = $user['usuario'];
                $_SESSION['tipo'] = $user['tipo'];
                header('Location: /ama/public/?url=Home/index');
                exit;
            }
        }

        $_SESSION['erro'] = 'Usuário ou senha inválidos.';
        header('Location: /ama/public/?url=Login/index');
    }

    public function sair() {
        session_destroy();
        header('Location: /ama/public/?url=Login/index');
    }
}

// Aqui termina código 4