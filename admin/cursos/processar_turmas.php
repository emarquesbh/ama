<?php
// admin/turmas/processar_turmas.php
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

    if ($acao === "inserir") {
        $stmt = $mysqli->prepare("INSERT INTO turmas (titulo, data, dias, horarios, mensalidade, descricao) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $titulo, $data, $dias, $horarios, $mensalidade, $descricao);
        $stmt->execute();
    } elseif ($acao === "editar" && $id > 0) {
        $stmt = $mysqli->prepare("UPDATE turmas SET titulo = ?, data = ?, dias = ?, horarios = ?, mensalidade = ?, descricao = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $titulo, $data, $dias, $horarios, $mensalidade, $descricao, $id);
        $stmt->execute();
    }

    header("Location: listar_turmas.php");
    exit;
}