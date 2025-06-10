<?php
// curso_delete.php
// Excluir curso existente
// Recebe o ID do curso por GET e remove do banco
// Confirmação de exclusão feita no link da listagem
// Após exclusão, redireciona para cursos.php
// Testado no XAMPP com banco ama

include_once("includes/_header.php");
include_once("includes/_menu.php");
// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Obter ID do curso
$id = (int) $_GET['id'];

// Deleta o curso
$mysqli->query("DELETE FROM cursos WHERE id = $id");

// Redireciona para a listagem de cursos
header("Location: cursos.php");
exit;
?>
