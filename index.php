
<?php
// Ativar exibição de erros (para debug)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexão com banco de dados (ajuste os dados conforme seu ambiente)
try {
    $db = new PDO('mysql:host=localhost;dbname=clube;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro de conexão: ' . $e->getMessage());
}

// Roteador simples
$controller = $_GET['controller'] ?? 'Curso';
$action = $_GET['action'] ?? 'index';

// Montar nome da classe
$controllerFile = "controllers/{$controller}Controller.php";
$controllerClass = $controller . 'Controller';

// Verificar se o controller existe
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Instanciar o controller
    $controllerInstance = new $controllerClass($db);

    // Verificar se o método (action) existe
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Ação '{$action}' não encontrada no controller '{$controllerClass}'.";
    }
} else {
    echo "Controller '{$controller}' não encontrado.";
}
?>
