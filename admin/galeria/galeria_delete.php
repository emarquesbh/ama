<?php
// admin/galeria/galeria_delete.php
include_once("../includes/conexao.php");

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $mysqli->prepare("DELETE FROM galeria WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: listar_galeria.php");
exit;