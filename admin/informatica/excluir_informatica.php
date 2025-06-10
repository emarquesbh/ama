<?php
// excluir_informatica.php
// Exclui uma aula de Informática pelo ID
// Após exclusão, redireciona para listar_informatica.php
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");
include_once("../includes/_conexao.php");

// Obter ID
$id = (int) $_GET['id'];

// Excluir registro
$mysqli->query("DELETE FROM informatica WHERE id = $id");

// Redirecionar
header("Location: listar_informatica.php");
exit;
?>
