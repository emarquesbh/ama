
<?php
// Arquivo de entrada do sistema AMA (público)
// Redireciona requisições para o App.php (roteador MVC)

require_once '../core/App.php';
require_once '../core/Controller.php';

session_start();

$app = new App();

// Aqui termina código 1
