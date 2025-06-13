<?php
// admin/lian_gong/lian_gong_delete.php
include_once("../includes/_header.php");

include_once("../includes/conexao.php");

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $mysqli->prepare("DELETE FROM lian_gong WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: listar_lian_gong.php");
exit;