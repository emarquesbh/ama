<?php
// verifica_login.php
// Protege páginas administrativas contra acesso não autorizado

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Exemplo de como restringir por tipo (caso necessário)
// if ($_SESSION['tipo'] !== 'admin') {
//     echo "Acesso restrito.";
//     exit;
// }
?>
