### INÍCIO DO ARQUIVO: ginastica_cerebral_edit.php
<?php
// admin/ginastica_cerebral/ginastica_cerebral_edit.php
include_once("../includes/_header.php");

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_ginastica_cerebral.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM ginastica_cerebral WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Ginástica Cerebral</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/tinymce/tinymce.min.js"></script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Ginástica Cerebral</h2>
    <form method="post" action="processar_ginastica_cerebral.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_ginastica_cerebral.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>