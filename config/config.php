<?php
/**
 * Arquivo: conexao.php
 * Pasta: app/config/
 * Descrição: Estabelece conexão com o banco de dados MariaDB.
 */

$host = 'localhost';
$db   = 'ama';           // Nome do seu banco
$user = 'root';          // Usuário do MySQL (padrão no XAMPP)
$pass = '';              // Senha (normalmente vazia no XAMPP)
$charset = 'utf8mb4';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
