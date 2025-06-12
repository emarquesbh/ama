
<?php
// admin/ginastica_cerebral/ginastica_cerebral_add.php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Ginástica Cerebral</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Adicionar Novo - Ginástica Cerebral</h2>
    <form method="post" action="processar_ginastica_cerebral.php">
        <input type="hidden" name="acao" value="inserir">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="listar_ginastica_cerebral.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
