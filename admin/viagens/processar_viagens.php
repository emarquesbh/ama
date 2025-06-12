<?php
// admin/viagens/processar_viagens.php

include_once("../includes/conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"] ?? '';
    $id = intval($_POST["id"] ?? 0);
    $titulo = trim($_POST["titulo"] ?? '');
    $data = $_POST["data"] ?? '';
    $dias = $_POST["dias"] ?? '';
    $horarios = $_POST["horarios"] ?? '';
    $mensalidade = $_POST["mensalidade"] ?? '';
    $descricao = $_POST["descricao"] ?? '';
    $cancelado = isset($_POST["cancelado"]) ? 1 : 0;

    if ($acao === "inserir") {
        $stmt = $mysqli->prepare("INSERT INTO viagens (titulo, data, dias, horarios, mensalidade, descricao, cancelado) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $titulo, $data, $dias, $horarios, $mensalidade, $descricao, $cancelado);
        $stmt->execute();
    } elseif ($acao === "editar" && $id > 0) {
        $stmt = $mysqli->prepare("UPDATE viagens SET titulo = ?, data = ?, dias = ?, horarios = ?, mensalidade = ?, descricao = ?, cancelado = ? WHERE id = ?");
        $stmt->bind_param("ssssssii", $titulo, $data, $dias, $horarios, $mensalidade, $descricao, $cancelado, $id);
        $stmt->execute();
    }

    header("Location: listar_viagens.php");
    exit;
}