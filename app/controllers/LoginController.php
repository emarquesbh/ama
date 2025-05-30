
<?php
/**
 * Arquivo: LoginController.php
 * Pasta: app/controllers/
 * Descrição: Controlador temporário de login desabilitado para testes
 */

class LoginController {
  public function autenticar() {
    // Login temporariamente desativado para testes
    session_start();
    $_SESSION['usuario'] = [
      'id' => 0,
      'login' => 'teste',
      'tipo' => 'admin'
    ];
    header('Location: ?url=Dashboard/index');
    exit;
  }

  public function logout() {
    session_start();
    session_destroy();
    header('Location: ?url=Login/index');
    exit;
  }

  public function index() {
    // Página simples informando como acessar durante os testes
    echo "<p style='text-align:center; margin-top: 20px;'>Login desativado temporariamente para testes.<br> Acesse: <a href='?url=Login/autenticar'>Login/autenticar</a> para entrar como admin.</p>";
  }
}
