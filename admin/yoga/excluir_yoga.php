<?php
// excluir_yoga.php
// Excluir aula de Yoga
// Recebe ID por GET e exclui do banco
// Após exclusão, redireciona para listar_yoga.php
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Obter ID
$id = (int) $_GET['id'];

// Excluir registro
$mysqli->query("DELETE FROM yoga WHERE id = $id");

// Redirecionar
header("Location: listar_yoga.php");
exit;
?>
