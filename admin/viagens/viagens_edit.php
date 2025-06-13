<?php
// admin/viagens/viagens_edit.php
include_once("../includes/_header.php");
include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_viagens.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM viagens WHERE id = ?");
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
    <title>Editar Viagens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Viagens</h2>
    <form method="post" action="processar_viagens.php">
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

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="cancelado" id="cancelado" value="1" <?= $dado['cancelado'] ? 'checked' : '' ?>>
            <label class="form-check-label" for="cancelado">Cancelar</label>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_viagens.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>