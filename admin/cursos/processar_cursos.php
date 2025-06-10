<?php
// processar_cursos.php
// Processa inserção ou atualização de curso
// Upload da imagem principal (gera imagem_menor + imagem_maior)
// Upload opcional de até 3 imagens de galeria
// Campos: nome, descrição, dias, horário, mensalidade, imagens
// Inclui campos de log: atualizado_por, atualizado_em
// Testado no XAMPP

include_once("includes/_header.php");
include_once("includes/_menu.php");
// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "ama");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Função para tratar upload da imagem (simples)
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
$nome        = $_POST['nome'];
$descricao   = $_POST['descricao'];
$dias        = $_POST['dias'];
$horario     = $_POST['horario'];
$mensalidade = str_replace(",", ".", $_POST['mensalidade']);

// Campos de log
$atualizado_por = 'admin'; // ou $_SESSION['usuario_nome']
$atualizado_em  = date('Y-m-d H:i:s');

// Pastas de upload
$pastaMaior = "../uploads/cursos/maior/";
$pastaMenor = "../uploads/cursos/menor/";
$pastaGaleria = "../uploads/cursos/galeria/";

// Processar imagem principal
$imagem_maior = uploadImagem('imagem_principal', $pastaMaior);
$imagem_menor = uploadImagem('imagem_principal', $pastaMenor);

// Processar imagens da galeria
$galeria1 = null;
$galeria2 = null;
$galeria3 = null;

if (isset($_FILES['galeria']['name'][0]) && $_FILES['galeria']['error'][0] == 0) {
    $total = count($_FILES['galeria']['name']);
    for ($i = 0; $i < $total; $i++) {
        $ext = pathinfo($_FILES['galeria']['name'][$i], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $ext;
        move_uploaded_file($_FILES['galeria']['tmp_name'][$i], $pastaGaleria . $nomeArquivo);
        
        if ($i == 0) $galeria1 = $nomeArquivo;
        if ($i == 1) $galeria2 = $nomeArquivo;
        if ($i == 2) $galeria3 = $nomeArquivo;
    }
}

// Verifica se é atualização (tem ID) ou novo cadastro
if (isset($_GET['id'])) {
    // Atualização
    $id = (int) $_GET['id'];

    // Monta SQL dinamicamente (se enviar novas imagens)
    $sql = "UPDATE cursos SET nome=?, descricao=?, dias=?, horario=?, mensalidade=?, atualizado_por=?, atualizado_em=?";
    $params = [$nome, $descricao, $dias, $horario, $mensalidade, $atualizado_por, $atualizado_em];
    $types = "sssssss";

    if ($imagem_maior && $imagem_menor) {
        $sql .= ", imagem_maior=?, imagem_menor=?";
        $params[] = $imagem_maior;
        $params[] = $imagem_menor;
        $types .= "ss";
    }

    if ($galeria1) { $sql .= ", galeria1=?"; $params[] = $galeria1; $types .= "s"; }
    if ($galeria2) { $sql .= ", galeria2=?"; $params[] = $galeria2; $types .= "s"; }
    if ($galeria3) { $sql .= ", galeria3=?"; $params[] = $galeria3; $types .= "s"; }

    $sql .= " WHERE id=?"; 
    $params[] = $id;
    $types .= "i";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $stmt->close();

} else {
    // Novo cadastro
    $stmt = $mysqli->prepare("INSERT INTO cursos (nome, descricao, dias, horario, mensalidade, imagem_maior, imagem_menor, galeria1, galeria2, galeria3, atualizado_por, atualizado_em) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdsssssss", $nome, $descricao, $dias, $horario, $mensalidade, $imagem_maior, $imagem_menor, $galeria1, $galeria2, $galeria3, $atualizado_por, $atualizado_em);
    $stmt->execute();
    $stmt->close();
}

// Redirecionar para cursos.php
header("Location: cursos.php");
exit;
?>
