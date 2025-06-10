<?php
// processar_informatica.php
// Processa cadastro ou edição de aula de Informática
// Com upload de imagem e campos de log
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");
include_once("../includes/_conexao.php");

// Função de upload
function uploadImagem($inputName, $pastaDestino) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
        $ext = pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $ext;
        move_uploaded_file($_FILES[$inputName]['tmp_name'], $pastaDestino . $nomeArquivo);
        return $nomeArquivo;
    }
    return null;
}

// Campos
$titulo    = $_POST['titulo'];
$horarios  = $_POST['horarios'];
$dia       = $_POST['dia'];
$valor     = str_replace(",", ".", $_POST['valor']);
$turma     = $_POST['turma'];
$descricao = $_POST['descricao'];

$atualizado_por = 'admin';
$atualizado_em  = date('Y-m-d H:i:s');

$pastaUpload = "../uploads/informatica/";
$imagem = uploadImagem('imagem', $pastaUpload);

// Verifica se é edição
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    if ($imagem) {
        $stmt = $mysqli->prepare("UPDATE informatica SET imagem=?, titulo=?, horarios=?, dia=?, valor=?, turma=?, descricao=?, atualizado_por=?, atualizado_em=? WHERE id=?");
        $stmt->bind_param("sssssdsssi", $imagem, $titulo, $horarios, $dia, $valor, $turma, $descricao, $atualizado_por, $atualizado_em, $id);
    } else {
        $stmt = $mysqli->prepare("UPDATE informatica SET titulo=?, horarios=?, dia=?, valor=?, turma=?, descricao=?, atualizado_por=?, atualizado_em=? WHERE id=?");
        $stmt->bind_param("ssssdsssi", $titulo, $horarios, $dia, $valor, $turma, $descricao, $atualizado_por, $atualizado_em, $id);
    }

    $stmt->execute();
    $stmt->close();

} else {
    $stmt = $mysqli->prepare("INSERT INTO informatica (imagem, titulo, horarios, dia, valor, turma, descricao, atualizado_por, atualizado_em) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssdsss", $imagem, $titulo, $horarios, $dia, $valor, $turma, $descricao, $atualizado_por, $atualizado_em);
    $stmt->execute();
    $stmt->close();
}

header("Location: listar_informatica.php");
exit;
?>
