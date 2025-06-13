<?php
// admin/cursos/cursos_delete.php
include_once("../includes/conexao.php");

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $mysqli->prepare("DELETE FROM cursos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: listar_cursos.php");
exit;