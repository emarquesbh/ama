<?php
// excluir_danca_salao.php
// Excluir aula de Dança de Salão
// Recebe ID por GET e exclui do banco
// Após exclusão, redireciona para listar_danca_salao.php
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");
include_once("../includes/_conexao.php");

// Obter ID
$id = (int) $_GET['id'];

// Excluir registro
$mysqli->query("DELETE FROM danca_salao WHERE id = $id");

// Redirecionar
header("Location: listar_danca_salao.php");
exit;
?>
