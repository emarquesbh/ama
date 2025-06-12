<?php
// admin/ginastica_cerebral/processar_ginastica_cerebral.php

include_once("../includes/conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"] ?? '';
    $id = intval($_POST["id"] ?? 0);
    $titulo = trim($_POST["titulo"] ?? '');
    $data = $_POST["data"] ?? '';

    if ($acao === "inserir") {
        $stmt = $mysqli->prepare("INSERT INTO ginastica_cerebral (titulo, data) VALUES (?, ?)");
        $stmt->bind_param("ss", $titulo, $data);
        $stmt->execute();
    } elseif ($acao === "editar" && $id > 0) {
        $stmt = $mysqli->prepare("UPDATE ginastica_cerebral SET titulo = ?, data = ? WHERE id = ?");
        $stmt->bind_param("ssi", $titulo, $data, $id);
        $stmt->execute();
    }

    header("Location: listar_ginastica_cerebral.php");
    exit;
}