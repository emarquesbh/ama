<?php
// processar_postura_alongamento.php
// Processa inserção ou atualização de aula de Postura e Alongamento
// Upload da imagem principal
// Inclui campos de log: atualizado_por, atualizado_em
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");
include_once("../includes/_conexao.php");

// Função para tratar upload da imagem
function uploadImagem($inputName, $pastaDestino) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
        $ext = pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $ext;
        move_uploaded_file($_FILES[$inputName]['tmp_name'], $pastaDestino . $nomeArquivo);
        return $nomeArquivo;
    }
    return null;
}

// Campos do formulário
$titulo    = $_POST['titulo'];
$horarios  = $_POST['horarios'];
$dia       = $_POST['dia'];
$valor     = str_replace(",", ".", $_POST['valor']);
$turma     = $_POST['turma'];
$descricao = $_POST['descricao'];

// Campos de log
$atualizado_por = 'admin'; // ou $_SESSION['usuario_nome']
$atualizado_em  = date('Y-m-d H:i:s');

// Pasta para upload
$pastaUpload = "../uploads/postura_alongamento/";

// Processar imagem
$imagem = uploadImagem('imagem', $pastaUpload);

// Verifica se é atualização (tem ID) ou novo cadastro
if (isset($_GET['id'])) {
    // Atualização
    $id = (int) $_GET['id'];

    // Monta SQL dinamicamente (se enviar nova imagem)
    if ($imagem) {
        $stmt = $mysqli->prepare("UPDATE postura_alongamento SET imagem=?, titulo=?, horarios=?, dia=?, valor=?, turma=?, descricao=?, atualizado_por=?, atualizado_em=? WHERE id=?");
        $stmt->bind_param("sssssdsssi", $imagem, $titulo, $horarios, $dia, $valor, $turma, $descricao, $atualizado_por, $atualizado_em, $id);
    } else {
        $stmt = $mysqli->prepare("UPDATE postura_alongamento SET titulo=?, horarios=?, dia=?, valor=?, turma=?, descricao=?, atualizado_por=?, atualizado_em=? WHERE id=?");
        $stmt->bind_param("ssssdsssi", $titulo, $horarios, $dia, $valor, $turma, $descricao, $atualizado_por, $atualizado_em, $id);
    }

    $stmt->execute();
    $stmt->close();

} else {
    // Novo cadastro
    $stmt = $mysqli->prepare("INSERT INTO postura_alongamento (imagem, titulo, horarios, dia, valor, turma, descricao, atualizado_por, atualizado_em) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssdsss", $imagem, $titulo, $horarios, $dia, $valor, $turma, $descricao, $atualizado_por, $atualizado_em);
    $stmt->execute();
    $stmt->close();
}

// Redirecionar para listar_postura_alongamento.php
header("Location: listar_postura_alongamento.php");
exit;
?>
