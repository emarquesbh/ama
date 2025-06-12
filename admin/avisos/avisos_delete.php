<?php
// admin/avisos/avisos_delete.php

include_once("../includes/conexao.php");
include_once("../includes/_header.php");
include_once("../includes/_menu.php");

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $mysqli->prepare("DELETE FROM avisos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: listar_avisos.php");
exit;
