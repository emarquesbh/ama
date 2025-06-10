<?php
// excluir_postura_alongamento.php
// Excluir aula de Postura e Alongamento
// Recebe ID por GET e exclui do banco
// Após exclusão, redireciona para listar_postura_alongamento.php
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");
include_once("../includes/_conexao.php");

// Obter ID
$id = (int) $_GET['id'];

// Excluir registro
$mysqli->query("DELETE FROM postura_alongamento WHERE id = $id");

// Redirecionar
header("Location: listar_postura_alongamento.php");
exit;
?>
