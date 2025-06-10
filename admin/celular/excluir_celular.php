<?php
// excluir_celular.php
// Excluir aula de Celular
// Recebe ID por GET e exclui do banco
// Após exclusão, redireciona para listar_celular.php
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");
include_once("../includes/_conexao.php");

// Obter ID
$id = (int) $_GET['id'];

// Excluir registro
$mysqli->query("DELETE FROM celular WHERE id = $id");

// Redirecionar
header("Location: listar_celular.php");
exit;
?>
