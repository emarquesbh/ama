// Aqui começa código 1: public/index.php
// Pasta: public/

<?php
// Arquivo de entrada do sistema AMA (público)
// Redireciona requisições para o App.php (roteador MVC)
session_start(); // Necessário para usar $_SESSION
require_once '../core/App.php';
require_once '../core/Controller.php';

$app = new App();

// Aqui termina código 1


