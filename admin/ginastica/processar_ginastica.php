<?php
// processar_ginastica.php
// Processa inserção ou atualização de aula de Ginástica
// Upload da imagem principal com GD (gera versão padrão)
// Campos: imagem, título, horários, dia, valor, turma, descrição
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");
// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

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

// Pasta para upload
$pastaUpload = "../uploads/ginastica/";

// Verifica se é atualização (tem ID) ou novo cadastro
if (isset($_GET['id'])) {
    // Atualização
    $id = (int) $_GET['id'];

    // Se veio nova imagem, processa
    $imagem = uploadImagem('imagem', $pastaUpload);

    if ($imagem) {
        // Atualiza com nova imagem
        $stmt = $mysqli->prepare("UPDATE ginastica SET imagem=?, titulo=?, horarios=?, dia=?, valor=?, turma=?, descricao=? WHERE id=?");
        $stmt->bind_param("sssssdsi", $imagem, $titulo, $horarios, $dia, $valor, $turma, $descricao, $id);
    } else {
        // Atualiza sem mexer na imagem
        $stmt = $mysqli->prepare("UPDATE ginastica SET titulo=?, horarios=?, dia=?, valor=?, turma=?, descricao=? WHERE id=?");
        $stmt->bind_param("ssssdsi", $titulo, $horarios, $dia, $valor, $turma, $descricao, $id);
    }

    $stmt->execute();
    $stmt->close();
} else {
    // Novo cadastro
    $imagem = uploadImagem('imagem', $pastaUpload);

    $stmt = $mysqli->prepare("INSERT INTO ginastica (imagem, titulo, horarios, dia, valor, turma, descricao) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdsd", $imagem, $titulo, $horarios, $dia, $valor, $turma, $descricao);
    $stmt->execute();
    $stmt->close();
}

// Redirecionar para listagem
header("Location: listar_ginastica.php");
exit;
?>
